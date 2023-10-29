<?php

namespace App\Http\Controllers;

use App\Http\Resources\MediaResource;
use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MediaController extends BaseController
{
    /**
     * List parents newspaper
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $class_id = $user->getParentsStudent()->class_id;

        $next = $request->get('next', 0);

        $month = Carbon::now()->subMonths($next);
        $startDate = $month->startOfMonth()->format('Y-m-d');
        $endDate = $month->endOfMonth()->format('Y-m-d');

        $photos = Media::where('class_id', $class_id)
            ->whereBetween('publish_date', [$startDate, $endDate])
            ->orderByDesc('publish_date')
            ->get();

        $data = $photos->groupBy(function ($photo) {
            return Carbon::createFromTimeString($photo->publish_date)->format('Y-m-d');
        })->map(function ($group) {
            return $group->map(function ($photo) {
                return new MediaResource($photo);
            });
        });

        return $this->sendResponse($data);
    }

    /**
     * List group newspaper
     */
    public function show(int $id)
    {
        $user = auth()->user();

        $class_id = $user->getParentsStudent()->class_id;

        $media = Media::where('class_id', $class_id)
            ->where('id', $id)
            ->firstOrFail();

        $data = new MediaResource($media);

        return $this->sendResponse($data);
    }


}
