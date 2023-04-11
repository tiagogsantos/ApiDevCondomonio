<?php

namespace App\Http\Controllers;

use App\Models\Billet;
use App\Models\Unit;
use Illuminate\Http\Request;

class BilletController extends Controller
{
    // Bilhetes
    public function getAll(Request $request)
    {
        $array = ['error' => ''];

        $properties = $request->input('properties');

        if (!empty($properties)) {
            $user = auth()->user();

            $unit = Unit::where('id', $properties)->where('id_owner', $user['id'])->count();

            if ($unit) {
                $billets = Billet::where('id', $properties)->get();

                foreach ($billets as $billetsKey => $billetValue) {
                    $billets[$billetsKey]['fileurl'] = asset('storage' . $billetValue);
                }

                $array['list'] = $billets;
            } else {
                $array['error'] = 'Essa propriedade não é sua!';
            }
        } else {
            $array['error'] = 'A propriedade é necessária!';
        }

        return $array;
    }
}
