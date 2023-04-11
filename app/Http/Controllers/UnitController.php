<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitPeople;
use App\Models\UnitPet;
use App\Models\UnitVehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function getInfo($id, Request $request)
    {
        $array = ['error' => ''];

        $unit = Unit::find($id);

        if ($unit) {

            $peoples = UnitPeople::where('id_unit', $id)->get();
            $vehicles = UnitVehicles::where('id_unit', $id)->get();
            $pets = UnitPet::where('id_unit', $id)->get();

            $array['peoples'] = $peoples;
            $array['vehicles'] = $vehicles;
            $array['pets'] = $pets;
        } else {
            $array['error'] = 'Não foi possível retornar a listagem';
        }

        return $array;
    }

    public function addPerson ($id, Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required|date'
        ]);

        if (!$validator->fails()) {
            $name = $request->input('name');
            $birthdate = $request->input('birthdate');

            $newPerson = new UnitPeople();
            $newPerson->name = $name;
            $newPerson->birthdate = $birthdate;
            $newPerson->id_unit = $id;
            $newPerson->save();
        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }

        return $array;
    }

    public function addVehicle ($id, Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'color' => 'required',
            'plate' => 'required'
        ]);

        if (!$validator->fails()) {
            $title = $request->input('title');
            $color = $request->input('color');
            $plate = $request->input('plate');

            $newVehicles = new UnitVehicles();
            $newVehicles->title = $title;
            $newVehicles->color = $color;
            $newVehicles->plate = $plate;
            $newVehicles->id_unit = $id;
            $newVehicles->save();
        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }

        return $array;
    }

    public function addpet($id, Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'race' => 'required'
        ]);

        if (!$validator->fails()) {
            $name = $request->input('name');
            $race = $request->input('race');

            $newPet = new UnitPet();
            $newPet->name = $name;
            $newPet->race = $race;
            $newPet->id_unit = $id;
            $newPet->save();

        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }

        return $array;
    }

    public function removePerson ($id)
    {
        $array = ['error' => ''];

        $person = UnitPeople::where('id', $id)->first();

        if (empty($person)) {
            $array['error'] = 'Usuário não encontrado para deleção!';
            return $array;
        } else {
            $person->delete();
        }
        return $array;
    }

    public function removevehicle ($id)
    {
        $array = ['error' => ''];

        $vehicles = UnitVehicles::where('id', $id)->first();

        if (empty($vehicles)) {
            $vehicles['error'] = 'Veículo não encontrado para deleção!';
            return $array;
        } else {
            $vehicles->delete();
        }
        return $array;
    }

    public function removepet ($id)
    {
        $array = ['error' => ''];

        $pet = UnitPet::where('id', $id)->first();

        if (empty($pet)) {
            $pet['error'] = 'Pet  não encontrado para deleção!';
            return $array;
        } else {
            $pet->delete();
        }
        return $array;
    }


}
