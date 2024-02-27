<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
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
        $schools = $user->getSchoolIds();

        $announcements = Announcement::whereIn('school_id', $schools)
            ->with(['recipients', 'contents'])
            ->orderByDesc('id')
            ->take(100)->get();

        $data = AnnouncementResource::collection($announcements);

        return $this->sendResponse($data);
    }

    /**
     * Display user's school
     */
    public function show(int $id)
    {
        $user = auth()->user();
        $userLang = app()->getLocale();

        $student = $user->getParentsStudent();

        $announcement = AnnouncementRecipient::where(['student_id' => $student->id, 'id' => $id])
            ->with(['announcement.contents' => function ($query) use ($userLang) {
                $query->where('lang', $userLang);
            }])
            ->firstOrFail();

        // Mark as read
        $announcement->read_at = new \DateTime();
        $announcement->save();

        $data = new AnnouncementResource($announcement);

        return $this->sendResponse($data);
    }

}
