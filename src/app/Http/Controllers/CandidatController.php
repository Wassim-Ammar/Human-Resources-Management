<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Jobs\SendEmailJob;
use App\Mail\CandidatResponse;
use App\Models\Candidat;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class CandidatController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf', // Adjust validation rules as needed
        ]);

        $file = $request->file('file');


        Storage::putFileAs('uploads', $file, 'file.pdf');

        return ApiResponse::success();
    }

    function getCv(): JsonResponse
    {
        Storage::download('/uploads/file.pdf', 'filename.pdf');

        return ApiResponse::success();
    }

    function sendEmailToTheCandidat(Request $request): JsonResponse
    {


        // SendEmailJob::dispatch();
        Mail::to($request->email)->send(new CandidatResponse($request->response, ($request->response == 'accept') ? 'ija ghodwa' : 'matjich'));

        return ApiResponse::success();
    }
}
