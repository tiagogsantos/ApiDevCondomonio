<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaDisableDay;
use App\Models\Reservation;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Array_;

class ReservationController extends Controller
{
    // Trazendo todas as reservas
    public function getReservations()
    {
        $array = ['error' => '', 'list' => []];
        $daysHelper = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

        $areas = Area::where('allowed', '1')->get();

        foreach ($areas as $area) {
            $daylist = explode(',', $area['days']);

            $dayGroups = [];

            // Adicionando o primeiro dia
            $lastDay = intval(current($daylist));
            $dayGroups[] = $daysHelper[$lastDay];
            array_shift($daylist);

            // Adicionando dias relevantes
            foreach ($daylist as $day) {
                if (intval($day) != $lastDay + 1) {
                    $dayGroups[] = $daysHelper[$lastDay];
                    $dayGroups[] = $daysHelper[$day];
                }

                $lastDay = intval($day);
            }

            // Adicionando o ultimo dia
            $dayGroups[] = $daysHelper[end($daylist)];

            // Juntando as datas dia1-dia2
            $dates = '';
            $close = 0;

            foreach ($dayGroups as $group) {
                if ($close === 0) {
                    $dates .= $group;
                } else {
                    $dates .= '-' . $group . ',';
                }
                $close = 1 - $close;
            }

            $dates = explode(',', $dates);
            array_pop($dates);

            // Adicionando o tempo
            $start = date('H:i', strtotime($area['start_time']));
            $end = date('H:i', strtotime($area['start_end']));

            foreach ($dates as $dKey => $dValue) {
                $dates[$dKey] .= ' ' . $start . ' às ' . $end;
            }

            $array['list'][] = [
                'id' => $area['id'],
                'cover' => asset('storage/' . $area['cover']),
                'title' => $area['title'],
                'dates' => $dates
            ];
        }

        return $array;
    }

    // Criando uma Reserva
    public function setReservations($id, Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i:s',
            'property' => 'required'
        ]);

        if (!$validator->fails()) {
            $date = $request->input('date');
            $time = $request->input('time');
            $property = $request->input('property');

            $unit = Unit::find($property);
            $area = Area::find($id);

            if ($unit && $area) {
                $can = true;

                $weekDay = date('w', strtotime($date));

                // Verificar se está dentro da dispobilidade padrão, ou seja, dia da semana e hora
                $allowedDays = explode(',', $area['days']);
                if (!in_array($weekDay, $allowedDays)) {
                    $can = false;
                } else {
                    $start = strtotime($area['start_time']);
                    $end = strtotime('-1 hour', strtotime($area['end_time']));
                    $timestamp = strtotime($time);
                    if ($timestamp < $start || $timestamp > $end) {
                        $can = false;
                    }
                }

                // Verificar se está fora dos disable days
                $existeDesabledDays = AreaDisableDay::where('id_area', $id)
                    ->where('day', $date)
                    ->count();

                if ($existeDesabledDays > 0) {
                    $can = false;
                }

                // Verificar se não existe outra reserva no mesmo dia e hora
                $existeReservations = Reservation::where('id_area', $id)
                    ->where('reservation_date', $date . ' ' . $time)
                    ->count();

                if ($existeReservations > 0) {
                    $can = false;
                }

                if ($can) {
                    $newReservation = new Reservation();
                    $newReservation->id_unit = $property;
                    $newReservation->id_area = $id;
                    $newReservation->reservation_date = $date . ' ' . $time;
                    $newReservation->save();
                } else {
                    $array['error'] = 'Reserva não permitida nesse dia e horário';
                    return $array;
                }

            } else {
                $array['error'] = 'Dados incorretos!';
                return $array;
            }

        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }

        return $array;
    }
}
