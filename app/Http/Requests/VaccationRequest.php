<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\GeneralResponse;
use App\Models\Vaccation;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class VaccationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            $this->validate([

                'start_date' => 'required',
                'end_date' => 'required',
                'type' => 'required',

            ])
        ];
    }

    public function createVaccation(): JsonResponse
    {
        $this->validated();

        $this['start_date'] = Carbon::parse($this['start_date']);
        $this['end_date'] = Carbon::parse($this['end_date']);

        $this['state'] = 'waiting';
        $this['user_id'] = Auth::user()->id;

        Vaccation::create($this->toArray());

        return ApiResponse::success();
    }
}
