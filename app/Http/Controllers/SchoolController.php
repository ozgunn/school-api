<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolResource;
use Illuminate\Http\Request;

class SchoolController extends BaseController
{
    /**
     * List user's schools
     */
    public function index(Request $request)
    {
        $schools = $this->findUserSchools();

        $data = [
            'schools' => SchoolResource::collection($schools),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display user's school
     */
    public function show(int $id)
    {
        $school = $this->findUserSchool($id);

        $data = new SchoolResource($school);

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
