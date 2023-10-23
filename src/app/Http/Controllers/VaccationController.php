<?php

namespace App\Http\Controllers;

use App\Actions\RetrieveVaccationWithUser;
use App\Http\Requests\VaccationRequest;
use App\Models\User;
use App\Models\Vaccation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VaccationController extends Controller
{

    public function index()
    {
        return RetrieveVaccationWithUser::index();
    }


    public function create()
    {
    }


    public function store(VaccationRequest $request)
    {
        $request->createVaccation();

        return RetrieveVaccationWithUser::index();
    }


    public function show()
    {

        return Auth::user()->vaccation;
    }


    public function edit(string $id, Request $request)
    {
        Vaccation::where('id', $id)->update([
            'state' => $request['state'],
        ]);
        return $this->index();
    }


    public function update(Request $request, string $id)
    {
        Auth::user()->vaccation->update([
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'type' => $request['type'],
        ]);

        return RetrieveVaccationWithUser::index();
    }


    public function destroy(string $id)
    {
        Vaccation::where('user_id', Auth::user()->id)->delete();

        return Vaccation::where('user_id', Auth::user()->id)->get();
    }
}
