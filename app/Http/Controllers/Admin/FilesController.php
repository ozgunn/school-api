<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\NewspaperRequest;
use App\Http\Resources\FileResource;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class FilesController extends BaseController
{
    const PATH = '/files';

    /**
     * List newspaper
     */
    public function index(Request $request)
    {
        $type = $request->type;
        $pdfs = $this->findResourceByType($type);

        $data = FileResource::collection($pdfs);

        return $this->sendResponse($data);
    }

    /**
     * List newspaper
     */
    public function show(int $id)
    {
        $pdf = $this->findResource($id);

        $data = new FileResource($pdf);

        return $this->sendResponse($data);
    }

    public function store(NewspaperRequest $request)
    {
        $validated = $request->validated();

//        if (!in_array($request->school_id, $this->userSchools())) {
//            return $this->sendError(trans('Error'), trans('Not allowed'));
//        }

        if (!$request->pdf) {
            return $this->sendError(trans('Error'), trans('File not selected'));
        }

        $pdf = $request->file('pdf');
        $validated['lang'] = $request->lang ?? config('app.languages')[0];

        $pdfFileName = $request->publish_year . '-' .
            $request->publish_month . '-' .
            $request->type . '-' ;

        if ($request->group_id && $request->type == Files::TYPE_PDF_GROUPS) {
            $pdfFileName .= $request->group_id . '-';
        }
        $pdfFileName .= $validated['lang'] . '.' .
            $pdf->getClientOriginalExtension();

        $result = $pdf->storeAs(self::PATH, $pdfFileName, 'public');

        if (!$result) {
            return $this->sendError(trans('Error'), trans('File could not uploaded'));
        }

        $validated['user_from'] = auth()->id();
        $validated['file'] = $pdfFileName;

        $model = Files::create($validated);
        Log::channel('db')->info('Newspaper created', ['id' => $model->id]);
        $data = new FileResource($model);

        return $this->sendResponse($data);
    }

    public function update(NewspaperRequest $request, int $id)
    {
        $validated = $request->validated();

        if ($validated['type'] == Files::TYPE_PDF_PARENTS) {
            $validated['group_id'] = null;
        }

        $pdf = $this->findResource($id);

//        if (!in_array($request->school_id, $this->userSchools())) {
//            return $this->sendError(trans('Error'), ['Not allowed']);
//        }

        $pdf->update($validated);
        Log::channel('db')->info('Newspaper updated', ['id' => $pdf->id]);
        $data = new FileResource($pdf);

        return $this->sendResponse($data);
    }

    /**
     * Delete media
     */
    public function destroy(int $id)
    {
        $pdf = $this->findResource($id);

        $filePath = public_path(self::PATH . '/' . $pdf->file);

        $pdf->delete();

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        Log::channel('db')->info('Newspaper deleted', ['id' => $pdf->id]);

        return $this->sendResponse(trans('Deleted successfully'));
    }

    private function userSchools()
    {
        $user = auth()->user();
        $schools = $user->getSchoolIds();

        return $schools;
    }

    private function findResource($id = null)
    {
        if ($id) {
            $resource = Files::where('id', $id)
                ->firstOrFail();
        } else {
            $resource = Files::orderByDesc('id')
                ->get();
        }

        return $resource;
    }

    private function findResourceByType($type = null)
    {
        $resource = Files::with('group')
            ->orderByDesc('id');

        if ($type && in_array($type, Files::TYPES)) {
            $resource = $resource->where('type', $type);
        }

        return $resource->get();
    }


}
