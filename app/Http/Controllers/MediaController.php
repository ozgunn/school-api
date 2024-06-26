<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MediaController extends BaseController
{
    const PATH = '/images/media';

    /**
     * List parents newspaper
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->role == User::ROLE_TEACHER)
            $class_id = $user->teachersClass->id;
        else
            $class_id = $user->getParentsStudent()->class_id;

        $day = $request->get('day');

        if ($day && strtotime($day)) {
            $photos = Media::where('class_id', $class_id)
                ->where('publish_date', $day)
                ->orderByDesc('id')
                ->get();
        } else {
            $next = $request->get('next', 0);

            $month = Carbon::now()->subMonths($next);
            $startDate = $month->startOfMonth()->format('Y-m-d');
            $endDate = $month->endOfMonth()->format('Y-m-d');

            $photos = Media::where('class_id', $class_id)
                ->whereBetween('publish_date', [$startDate, $endDate])
                ->orderByDesc('publish_date')
                ->get();
        }

        $data = $photos->groupBy(function ($photo) {
            return Carbon::createFromTimeString($photo->publish_date)->format('Y-m-d');
        })->map(function ($group) {
            return $group->map(function ($photo) {
                return new MediaResource($photo);
            });
        })->values();

        return $this->sendResponse($data);
    }

    /**
     * Show media
     */
    public function show(int $id)
    {
        $user = auth()->user();

        if ($user->role == User::ROLE_TEACHER)
            $class_id = $user->teachersClass->id;
        else
            $class_id = $user->getParentsStudent()->class_id;

        $media = Media::where('class_id', $class_id)
            ->where('id', $id)
            ->firstOrFail();

        $data = new MediaResource($media);

        return $this->sendResponse($data);
    }

    public function upload(MediaRequest $request)
    {
        $user = auth()->user();
        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $schoolClass = $user->teachersClass;
        $day = date("Y-m-d",time());

        $files = $request->file('files');

        foreach ($files as $image) {
            $imageName = implode('-', [
                $user->id,
                $schoolClass->id,
                time(),
                Str::random(8),
            ]);
            $imageName .= '.'. $image->getClientOriginalExtension();

            $errors = [];

            $result = $image->storeAs(self::PATH, $imageName, 'public');
            if (!$result) {
                $errors[] = ['upload' => $image->getClientOriginalName()];
            }

            $media = Media::create([
                'user_id' => $user->id,
                'school_id' => $schoolClass->school_id,
                'class_id' => $schoolClass->id,
                'publish_date' => $day,
                'file' => $imageName,
                'description' => $request->description,
                'type' => Media::TYPE_PHOTO,
            ]);

            if (!$media) {
                $errors[] = ['db' => $image->getClientOriginalName()];
            }
        }

        if (!empty($errors)) {
            return $this->sendError(trans('Error'), $errors);
        }

        return $this->sendResponse(trans('Uploaded successfully'));
    }

    /**
     * Delete media
     */
    public function delete(int $id)
    {
        $user = auth()->user();

        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $media = Media::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        $filePath = public_path(self::PATH . '/' . $media->file);

        if (File::exists($filePath)) {
            File::delete($filePath);
            Log::info('image deleted: '. $filePath,);
        }

        return ($media->delete()) ? $this->sendResponse(trans('Deleted successfully')) : $this->sendError(trans('Error'));
    }

}
