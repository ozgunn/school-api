<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
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
        $result = $this->findResource();

        $data = MediaResource::collection($result);

        return $this->sendResponse($data);
    }

    /**
     * Delete media
     */
    public function destroy(int $id)
    {
        $media = $this->findResource($id);

        $filePath = public_path(self::PATH . '/' . $media->file);

        if (File::exists($filePath)) {
            File::delete($filePath);
            Log::info('image deleted: '. $filePath);
        }

        return ($media->delete()) ? $this->sendResponse(trans('Deleted successfully')) : $this->sendError(trans('Error'));
    }

    private function findResource($id = null)
    {
        $user = auth()->user();
        $schools = $user->getSchoolIds();

        if ($id) {
            $resource = Media::where('id', $id)
                ->whereIn('school_id', $schools)
                ->firstOrFail();
        } else {
            $resource = Media::whereIn('school_id', $schools)
                ->with('user')
                ->with('school')
                ->with('schoolClass')
                ->with('group')
                ->orderByDesc('id')
                ->take(100)->get();
        }

        return $resource;
    }

}
