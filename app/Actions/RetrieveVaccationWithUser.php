<?php

namespace App\Actions;

use App\Models\Vaccation;

class RetrieveVaccationWithUser
{
    public static function index()
    {
        $vaccation = Vaccation::all();
        $array = [];

        foreach ($vaccation as $vacc) {
            $array[] = [
                'id' => $vacc->id,
                'start_date' => $vacc->start_date,
                'end_date' => $vacc->end_date,
                'type' => $vacc->type,
                'state' => $vacc->state,
                'user' => [$vacc->user]
            ];
        }

        return $array;
    }
}
