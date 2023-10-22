<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\GeneralResponse;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserRequest extends FormRequest
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
                'name' => 'required',
                'surname' => 'required',
                'cin' => 'required',
                'mobile' => 'required',
                'role' => 'required',
                'city' => 'required',
                'address' => 'required',
                'permission' => 'required',
                'state' => 'required',
            ])
        ];
    }

    public function store(): JsonResponse
    {
        $this->validated();

        $this['password'] = 'password';
        $this['email'] = $this['name'] . '.' . $this['surname'] . '@gmail.com';
        $this['permission'] = $this['permission']['value'];
        $this['role'] = $this['role']['value'];
        $this['city'] = $this['city']['value'];

        User::create($this->toArray());

        return  ApiResponse::success();
    }

    public function update($user)
    {

        $this->validated();

        User::where('id', $user->id)->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'cin' => $this->cin,
            'mobile' => $this->mobile,
            'role' => $this->role,
            'city' => $this->city,
            'address' => $this->address,
            'permission' => $this->permission,
            'state' => $this->state,

        ]);
        return $this->index();
    }
}
