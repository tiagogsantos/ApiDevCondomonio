<?php

namespace App\Http\Controllers;

use App\Models\FoundAndLost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoundAndLostController extends Controller
{
    public function getAll()
    {
        $array = ['error' => ''];

        $lost = FoundAndLost::where('status', 'LOST')
            ->orderBy('datecreated', 'DESC')->get();

        $recovered = FoundAndLost::where('status', 'RECOVERED')
            ->orderBy('datecreated', 'DESC')->get();

        foreach ($lost as $lostKey => $lostValue) {
            $lost[$lostKey]['datecreated'] = date('d-m-Y', strtotime($lostValue['datecreated']));
            $lost[$lostKey]['photo'] = asset('storage' . $lostValue['photo']);
        }

        foreach ($recovered as $recoveredKey => $recoveredValue) {
            $recovered[$recoveredKey]['datecreated'] = date('d-m-Y', strtotime($recoveredValue['datecreated']));
            $recovered[$recoveredKey]['photo'] = asset('storage' . $recoveredValue['photo']);
        }

        $array['lost'] = $lost;
        $array['recovered'] = $lost;

        return $array;
    }

    public function insert(Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'where' => 'required',
            'photo' => 'required|file|mimes:jpg,png'
        ]);

        if (!$validator->fails()) {
            $description = $request->input('description');
            $where = $request->input('where');
            $file = $request->file('photo')->store('public');
            $file = explode('public/', $file);
            $photo = $file[1];

            $newLost = new FoundAndLost();
            $newLost->status = 'LOST';
            $newLost->photo = $photo;
            $newLost->description = $description;
            $newLost->where = $where;
            $newLost->datecreated = date('Y-m-d');
            $newLost->save();

        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }
        return $array;
    }

    public function update($id, Request $request): array
    {
        $array = ['error' => ''];

        $item = FoundAndLost::find($id);

        $status = $request->input('status');

        if ($status && in_array($status, ['lost, recovered'])) {

            if ($item) {
                $item->status = $status;
                $item->save();
            } else {
                $array['error'] = 'Não foi possível atualizar!';
                return $array;
            }
        } else {
            dd($array);


            $array['error'] = 'Status não existe!';
            return $array;
        }

        return $array;
    }
}
