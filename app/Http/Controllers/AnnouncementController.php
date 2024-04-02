<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnouncementResource;
use App\Models\AnnouncementRecipient;
use App\Models\User;
use Illuminate\Http\Request;

class AnnouncementController extends BaseController
{
    /**
     * List user's schools
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $userLang = app()->getLocale();

        if ($user->role == User::ROLE_PARENT) {
            $student = $user->getParentsStudent();

            $announcements = AnnouncementRecipient::where('student_id', $student->id)
                ->with(['announcement.contents' => function ($query) use ($userLang) {
                    $query->where('lang', $userLang);
                }])
                ->get();
        } else {
            $announcements = AnnouncementRecipient::where('teacher_id', $user->id)
                ->with(['announcement.contents' => function ($query) use ($userLang) {
                    $query->where('lang', $userLang);
                }])
                ->get();
        }
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
        $userLang = app()->getLocale();

        if ($user->role == User::ROLE_PARENT) {
            $student = $user->getParentsStudent();

            $announcement = AnnouncementRecipient::where(['student_id' => $student->id, 'id' => $id])
                ->with(['announcement.contents' => function ($query) use ($userLang) {
                    $query->where('lang', $userLang);
                }])
                ->firstOrFail();
        } else {
            $announcement = AnnouncementRecipient::where(['teacher_id' => $user->id, 'id' => $id])
                ->with(['announcement.contents' => function ($query) use ($userLang) {
                    $query->where('lang', $userLang);
                }])
                ->firstOrFail();
        }
        // Mark as read
        $announcement->read_at = new \DateTime();
        $announcement->save();

        $data = new AnnouncementResource($announcement);

        return $this->sendResponse($data);
    }

}
