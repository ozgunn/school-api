<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\AnnouncementRequest;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use App\Models\AnnouncementContent;
use App\Models\AnnouncementRecipient;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function store(AnnouncementRequest $request)
    {
        $validated = $request->validated();
        $validated['sender_id'] = auth()->id();

        try {

            $announcement = DB::transaction(function () use ($validated) {
                $announcement = Announcement::create($validated);

                if (!$announcement) {
                    throw new \Exception('Create Failed!');
                }

                $validated['announcement_id'] = $announcement->id;
                $content = new AnnouncementContent($validated);
                $announcement->contents()->save($content);

                if ($announcement->target == Announcement::TARGET_STUDENT) {
                    $students = Student::where(['class_id' => $validated['class_id'], 'school_id' => $validated['school_id']])->get();
                    foreach ($students as $student) {
                        $recipient = new AnnouncementRecipient([
                            'announcement_id' => $announcement->id,
                            'student_id' => $student->id,
                        ]);
                        $announcement->recipients()->save($recipient);
                        $student->sendNotification(auth()->user(), __('New announcement'), substr($validated['content'], 0,100) . '...', 'announcements');
                    }
                } else if ($announcement->target == Announcement::TARGET_TEACHER) {
                    //$teacher = User::where(['id' => $validated['teacher_id']])->firstOrFail();
                    $teacher = User::with('teacherClass')
                        ->whereHas('teacherClass', function($query) use ($validated) {
                            $query->where('id', $validated['class_id']);
                        })->firstOrFail();
                    $recipient = new AnnouncementRecipient([
                        'announcement_id' => $announcement->id,
                        'teacher_id' => $teacher->id,
                    ]);

                    $announcement->recipients()->save($recipient);

                    $teacher->sendNotification(auth()->user(), __('New announcement'), substr($validated['content'], 0,100) . '...', 'announcements');
                }

                return $announcement;
            });

            Log::channel('db')->info('Announcement created', ['id' => $announcement->id]);
            return $this->sendResponse(new AnnouncementResource($announcement), __('Announcement created successfully'));

        } catch (\Exception $exception) {
            Log::channel('db')->error('Announcement create failed', ['error' => $exception->getMessage()]);
            return $this->sendError(__("Create Failed"), __($exception->getMessage()));
        }
    }

    /**
     * Update
     */
    public function update(AnnouncementRequest $request, int $id)
    {
        abort(403);
        $bus = $this->findUserBus($id);
        $validated = $request->validated();

        $bus->update($validated);
        Log::channel('db')->info('Announcement updated', ['id' => $bus->id]);

        return $this->sendResponse(new BusResource($bus), __('Announcement updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        abort(403);
        $announcement = $this->findResource($id);

        try {
            $announcement->delete();
            Log::channel('db')->info('Announcement deleted', ['id' => $announcement->id]);

            return $this->sendResponse(__('Deleted'), __('Announcement deleted successfully.'));
        } catch (\Exception $e) {
            Log::channel('db')->error('Announcement delete failed', ['error' => $e->getMessage()]);
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    private function findResource(int $id)
    {
        $user = auth()->user();
        $schools = $user->getSchoolIds();

        if ($user->role === User::ROLE_SUPERADMIN) {
            $announcement = Announcement::where(['id' => $id])->firstOrFail();
        } else {
            $announcement = Announcement::where(['id' => $id])->whereIn('school_id', $schools)->firstOrFail();
        }

        return $announcement;
    }

}
