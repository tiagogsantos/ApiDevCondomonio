<?php

namespace App\Http\Controllers;

use App\Models\Wall;
use App\Models\WallLike;
use Illuminate\Http\Request;

class WallController extends Controller
{
    // Retorno de avisos
    public function getAll()
    {
        $array = ['error' => '', 'list' => []];

        $user = auth()->user();

        $walls = Wall::get();

        foreach ($walls as $wallKey => $wallValue) {
            $walls[$wallKey]['likes'] = 0;
            $walls[$wallKey]['liked'] = false;

            $likes = WallLike::where('id_wall', $wallValue['id'])->count();
            $walls[$wallKey]['likes'] = $likes;

            $meLikes = WallLike::where('id_wall', $wallValue['id'])->where('id_user', $user['id'])->count();

            if ($meLikes > 0) {
                $walls[$wallKey]['liked'] = true;
            }
        }

        $array['list'] = $walls;

        return $array;
    }

    public function like($id)
    {
        $array = ['error' => ''];

        $user = auth()->user();

        $meLikes = WallLike::where('id_wall', $id)->where('id_user', $user['id'])->count();

        if ($meLikes > 0) {
            // Remover Like
            WallLike::where('id_wall', $id)->where('id_user', $user['id'])->delete();
            $array['liked'] = false;
        } else {
            // Adicionar Like

            $contemPost = Wall::where('id', $id)->first();

            if (!empty($contemPost)) {
                $newLike = new WallLike();
                $newLike->id_wall = $id;
                $newLike->id_user = $user['id'];
                $newLike->save();
                $array['liked'] = true;
            } else {
                $array['error'] = 'Não tem avisos para o ID selecionado!!';
            }
        }

        $array['likes'] = WallLike::where('id_wall', $id)->count();

        return $array;
    }
}
