<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnouncementResource;
use App\Models\AnnouncementRecipient;
use Illuminate\Http\Request;

class AnnouncementController extends BaseController
{
    /**
     * List user's schools
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $userLang = $user->language ?? config('app.defaults.locale');

        $student = $user->getParentsStudent();

        $announcements = AnnouncementRecipient::where('student_id', $student->id)
            ->with(['announcement.contents' => function ($query) use ($userLang) {
                $query->where('lang', $userLang);
            }])
            ->get();

        $data = [
            'announcements' => AnnouncementResource::collection($announcements),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display user's school
     */
    public function show(int $id)
    {
        $user = auth()->user();
        $userLang = $user->language ?? config('app.defaults.locale');

        $student = $user->getParentsStudent();

        $announcement = AnnouncementRecipient::where(['student_id' => $student->id, 'id' => $id])
            ->with(['announcement.contents' => function ($query) use ($userLang) {
                $query->where('lang', $userLang);
            }])
            ->firstOrFail();

        $data = new AnnouncementResource($announcement);

        return $this->sendResponse($data);
    }

    private function findUserSchools()
    {
        $user = auth()->user();

        return $user->getSchools();
    }

    private function findUserSchool(int $id)
    {
        $user = auth()->user();

        return $user->schools()->whereNotNull('parent_id')->where(['school_id' => $id])->firstOrFail();
    }
}
