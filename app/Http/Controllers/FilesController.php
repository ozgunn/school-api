<?php

namespace App\Http\Controllers;

use App\Http\Resources\FileResource;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FilesController extends BaseController
{
    /**
     * List parents newspaper
     */
    public function parent(Request $request)
    {
        $user = auth()->user();

        //$school = $user->getSchool();

        $pdfs = Files::where('type', Files::TYPE_PDF_PARENTS)
            //->where('school_id', $school->id)
            ->orderByDesc('publish_year')
            ->orderByDesc('publish_month')
            ->limit(12)
            ->get();

        $data = FileResource::collection($pdfs);
        Log::channel('db')->info('parent newspapers listed', ['ip' => \request()->ip()]);

        return $this->sendResponse($data);
    }

    /**
     * List group newspaper
     */
    public function group(Request $request)
    {
        $user = auth()->user();

        //$school = $user->getSchool();

        $group_id = $user->getParentsStudent()->class->group_id;

        $pdfs = Files::where('type', Files::TYPE_PDF_GROUPS)
           // ->where('school_id', $school->id)
            ->where('group_id', $group_id)
            ->orderByDesc('publish_year')
            ->orderByDesc('publish_month')
            ->limit(12)
            ->get();

        $data = FileResource::collection($pdfs);
        Log::channel('db')->info('group newspapers listed', ['ip' => \request()->ip()]);

        return $this->sendResponse($data);
    }


}
