<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\DataResponse;
use App\Models\ToDoItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoItemController extends Controller
{

    public function index(): JsonResponse
    {
        return ApiResponse::success(Auth::user()->toDoItem);
    }

    public function store(Request $request): JsonResponse
    {
        ToDoItem::create(["description" => $request->description, "state" => 'waiting', "user_id" => Auth::user()->id]);

        return ApiResponse::success(Auth::user()->toDoItem);
    }
}
