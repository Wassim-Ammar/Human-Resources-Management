<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\DataResponse;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    public function index()
    {
        return ApiResponse::success(Meeting::all());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $meeting = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Meeting::create($meeting);

        return $this->index();
    }

    public function update(Request $request, string $id)
    {
        Meeting::where('id', $id)->update([
            'title' => $request['title'],
            'description' => $request['description'],

        ]);

        return $this->index();
    }


    public function destroy(string $id)
    {
        Meeting::where('id', $id)->delete();

        return $this->index();
    }
}
