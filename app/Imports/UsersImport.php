<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use App\Models\Users\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Utils;
use App\Mail\EmailTeamInvitation;
use App\Models\TeamInvitation;
use App\Helpers\Consult;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $current_team_id = Auth::user()->current_team_id;

        $i = 0;
        $len = count($rows);
        $id=0;
        foreach ($rows as $row)
        {
            $id = $row[0];
            echo  $id;
            if ($i > 0 & $id > 0) {
                $name = $row[1];
                $surname = $row[2];
                $position = $row[3];
                $email = $row[4];
                echo $email;

                $response = Consult::emailInvitation($email, $current_team_id, $name, $surname, $position);

                echo $response;
            }
            echo '<br />';
            $i++;
        }

    }


}
