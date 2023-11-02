<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Users\User;
use App\Models\Teams\Team;
use App\Models\Teams\TeamUser;
use App\Models\Teams\Leader;

use Session;
use Carbon\Carbon;
Carbon::setLocale('es');

class Utils {

    public static function existInString($str, $findme)
    {
        $pos = strpos($str, $findme);
        if ($pos === false) {
            return 0;
        } else {
            return 1;
        }

    }


    public static function genReference($prefijo, $id, $limit)
    {
        $length = $limit - strlen($prefijo);
        $new_id = $id++;
        $id_length = strlen($new_id);
        for ($i = $id_length; $i < $length; $i++) {
            $new_id = '0'.$new_id;
        }
        $reference = $prefijo . $new_id;

        return $reference;
    }


    public static function genKey($length)
    {
        $characters = '0123456789';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
    }


    public static function genRandAlphaNumber($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }


    public static function genRandNumber($length)
    {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }


    public static function genPW($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function dateAgo($thisDate)
    {
        $date_ago = Carbon::createFromFormat('Y-m-d H:i:s', $thisDate)->diffForHumans(Carbon::now());
        return $date_ago;
    }

    public static function monthSpanish($x)
    {
        if ($x < 0 || $x > 12) {
            $x = 0;
        }
        $m[] = 'Desconocido';
        $m[] = 'Enero';
        $m[] = 'Febrero';
        $m[] = 'Marzo';
        $m[] = 'Mayo';
        $m[] = 'Mayo';
        $m[] = 'Junio';
        $m[] = 'Julio';
        $m[] = 'Agosto';
        $m[] = 'Septiembre';
        $m[] = 'Octubre';
        $m[] = 'Noviembre';
        $m[] = 'Diciembre';

        return $m[$x];
    }

    public static function shortMonthSpanish($x)
    {
        if ($x < 0 || $x > 12) {
            $x = 0;
        }
        $m[] = '-';
        $m[] = 'Ene';
        $m[] = 'Feb';
        $m[] = 'Mar';
        $m[] = 'May';
        $m[] = 'May';
        $m[] = 'Jun';
        $m[] = 'Jul';
        $m[] = 'Ago';
        $m[] = 'Sep';
        $m[] = 'Oct';
        $m[] = 'Nov';
        $m[] = 'Dic';

        return $m[$x];
    }

    public static function saveUserLog($user, $action, $reference)
    {
        $attributes_log = [
            'action'     => $action,
            'reference'  => $reference,
            'ip_address' => request()->ip()
        ];
        $user->userLogs()->create($attributes_log);
    }




    /**
     * Tiempo para el evento
     */
    public static function secondsToCountDown($dateTime)
    {
        $now = Carbon::now()->timestamp;
        $countdown =  Carbon::parse($dateTime)->timestamp;
        $difference = $countdown - $now;
        if ($difference<0) {
            $difference = 0;
        }

        return $difference;
    }

    public static function milisecondsToCountDown($dateTime)
    {
        $now = Carbon::now()->timestamp;
        $countdown =  Carbon::parse($dateTime)->timestamp;
        $difference = $countdown - $now;
        $difference = 1000 * $difference;
        if ($difference<0) {
            $difference = 0;
        }

        return $difference;
    }

    public static function shortSessionId()
    {
        $session_id = Session::getId();
        $short = substr($session_id, -8);

        return $short;
    }

    public static function cleanWhastapp($whatsapp)
    {
        $whatsapp = trim($whatsapp);
        $whatsapp = str_replace("(","", $whatsapp);
        $whatsapp = str_replace(")","", $whatsapp);
        $whatsapp = str_replace("+","", $whatsapp);
        $whatsapp = str_replace(" ","", $whatsapp);
        $whatsapp = str_replace("-","", $whatsapp);

        return $whatsapp;
    }

    public static function labelStatus($x)
    {
        if ($x) {
            return '<span class="text-white badge btn-success">SI</span>';
        } else {
            return '<span class="text-white badge btn-danger">NO</span>';
        }
    }

    public static function labelUserStatus($x)
    {
        if ($x == 1) {
            return '<span class="text-white badge btn-success">Activo</span>';
        } else if ($x == 2) {
            return '<span class="text-white badge btn-danger">Desactivado</span>';
        } else {
            return '<span class="text-white badge btn-info">Invitado</span>';
        }
    }

    public static function showHours($mins)
    {
        $hours = (int)$mins/60;
        $hours = round($hours, 2);
        return $hours;
    }

    public static function showMinutes($sgs)
    {
        $mins = (int)$sgs/60;
        $mins = round($mins, 2);
        return $mins;
    }



}
