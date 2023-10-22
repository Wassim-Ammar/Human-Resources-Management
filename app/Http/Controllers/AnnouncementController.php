<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\DataResponse;
use App\Models\Announcement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function index(): JsonResponse
    {
        return ApiResponse::success(Announcement::all());
    }

    public function store(Request $request)
    {
        $announcement = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Announcement::create($announcement);

        return ApiResponse::success(Announcement::all());
    }

    public function update(Request $request, string $id)
    {
        Announcement::where('id', $id)->update([
            'title' => $request['title'],
            'description' => $request['description'],

        ]);
        return ApiResponse::success(Announcement::all());
    }


    public function destroy(string $id)
    {
        Announcement::where('id', $id)->delete();

        return ApiResponse::success(Announcement::all());
    }
}
