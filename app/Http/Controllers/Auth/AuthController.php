<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthRequest;
use App\Http\Responses\ApiResponse;
use App\Http\Responses\DataResponse;
use App\Http\Responses\MessageResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function authenticate(AuthRequest $request): JsonResponse
    {

        if ($request->authenticate()) {
            $request->session()->regenerate();

            return ApiResponse::success(Auth::user());
        }

        return ApiResponse::error('The provided credentials do not match our records.');
    }

    public function me(): JsonResponse
    {
        return ApiResponse::success(Auth::user());
    }
}
