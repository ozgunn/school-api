<?php

namespace App\Http\Controllers;

use App\Http\Components\Paginator;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class MessageController extends BaseController
{
    /**
     * List school messages
     */
    public function school(Request $request)
    {
        $user = auth()->user();

        $student = $user->getParentsStudent();

        $query = Message::where(['school_id' => $student->school_id, 'student_id' => $student->id]);

        $allowedSort = ['id'];
        $messages = Paginator::sort($request, $query, $allowedSort, 'desc')->paginate(config('app.defaults.pageSize'));

        $data = [
            'messages' => MessageResource::collection($messages),
            'pagination' => Paginator::paginate($messages)
        ];

        return $this->sendResponse($data);
    }

    /**
     * List school messages
     */
    public function teacher(Request $request)
    {
        $user = auth()->user();

        $student = $user->getParentsStudent();

        $teacher_id = $student->class->teacher->id;

        $query = Message::where(['teacher_id' => $teacher_id, 'student_id' => $student->id]);

        $allowedSort = ['id'];
        $messages = Paginator::sort($request, $query, $allowedSort, 'desc')->paginate(config('app.defaults.pageSize'));

        $data = [
            'messages' => MessageResource::collection($messages),
            'pagination' => Paginator::paginate($messages)
        ];

        return $this->sendResponse($data);
    }

    public function teacherStore(MessageRequest $request)
    {
        $user = auth()->user();
        $student = $user->getParentsStudent();
        $teacher_id = $student->class->teacher_id;

        $validated = $request->validated();

        if ($validated['teacher_id'] !== $teacher_id)
            throw new NotAcceptableHttpException();

        $validated['user_id'] = $user->id;
        $validated['student_id'] = $student->id;
        $validated['ip'] = $request->getClientIp();
        $validated['type'] = Message::TYPE_TEACHER;

        $message = Message::create($validated);

        return $this->sendResponse($message ? new MessageResource($message): null);
    }

    public function schoolStore(MessageRequest $request)
    {
        $user = auth()->user();
        $student = $user->getParentsStudent();
        $school_id = $student->school_id;

        $validated = $request->validated();
        if ($validated['school_id'] !== $school_id)
            throw new NotAcceptableHttpException();

        $validated['user_id'] = $user->id;
        $validated['student_id'] = $student->id;
        $validated['ip'] = $request->getClientIp();
        $validated['type'] = Message::TYPE_SCHOOL;

        $message = Message::create($validated);

        return $this->sendResponse($message ? new MessageResource($message): null);
    }

}
