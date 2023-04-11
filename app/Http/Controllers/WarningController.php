<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WarningController extends Controller
{
    // Retorno de Warnings
    public function getMyWarnings(Request $request)
    {
        $array = ['error' => ''];

        $properties = $request->input('properties');

        if (!empty($properties)) {

            $user = auth()->user();

            $unit = Unit::where('id', $properties)->where('id_owner', $user['id'])->count();

            if ($unit > 0) {
                $warnings = Warning::where('id_unit', $properties)->orderBy('datecreated', 'DESC')->get();

                foreach ($warnings as $warningsKey => $warningsValue) {
                    $warnings[$warningsKey]['datecreated'] = date('d/m/Y', strtotime($warningsValue['datecreated']));
                    $photoList = [];

                    $photos = explode(',', $warningsValue['photos']);

                    foreach ($photos as $photo) {
                        if (!empty($photos)) {
                            $photoList[] = asset('storage/' . $photo);
                        }
                    }

                    $warnings[$warningsKey]['photos'] = $photoList;
                }

                $array['list'] = $warnings;

            } else {
                $array['error'] = 'Essa unidade não é sua!';
            }

        } else {
            $array['error'] = 'A propriedade é necessária!';
        }

        return $array;
    }

    // Salvando a fotos enviada de ocorrências
    public function addWarningFile(Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'photos' => 'required|file|mimes:jpg,jpeg,png'
        ]);

        if (!$validator->fails()) {
            $files = $request->file('photos')->store('public/warnings');

            $array['photo'] = asset(Storage::url($files));
        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }

        return $array;
    }

    public function setWarning(Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'properties' => 'required',
            'title' => 'required'
        ]);

        if (!$validator->fails()) {
            $title = $request->input('title');
            $properties = $request->input('properties');
            $list = $request->input('list');

            $newWarn = new Warning();
            $newWarn->title = $title;
            $newWarn->id_unit = $properties;
            $newWarn->status = 'IN_REVIEW';
            $newWarn->datecreated = date('Y-m-d');

            if ($list && is_array($list)) {
                $photos = [];
                foreach ($list as $listItem) {
                    $url = explode('/', $listItem);
                    $photos[] = end($url);
                }

                $newWarn->photos = implode(',', $photos);
            } else {
                $newWarn->photos = '';
            }

            $newWarn->save();
        } else {
            $array['error'] = $validator->errors()->first();
        }

        return $array;
    }

}
