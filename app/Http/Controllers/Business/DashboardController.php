<?php

namespace App\Http\Controllers\Business;

use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use App\Models\Courses\CourseFollowup;
use App\Models\Teams\TeamUser;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if ($user->update_password) {
            flash('Cambia la contraseña antes que se venza');
            return redirect()->route('members.profilepw');
        }

        $dashboard = (object)[];
        $year  = date('Y');
        $month = date('n');

        $date = \Carbon\Carbon::now();

        $team_users = TeamUser::whereTeam_id($user->current_team_id)->get();
        $list = array();
        foreach ($team_users as $team_user) {
            $list[] = $team_user->user_id;
        }

        for ($i=11; $i>=0 ; $i--) {
            $this_month = $month - $i;
            $this_year = $year;
            if ($this_month < 1) {
                $this_month = $this_month + 12;
                $this_year = $this_year - 1;
            }

            $dashboard->categories[]   =  Utils::shortMonthSpanish($this_month);
            $dashboard->graph1[] = $this->getTotalUsersByMonth($this_year, $this_month, $list);
            $dashboard->graph2[] = $this->geTotalUsersWhoTakeACourse($this_year, $this_month, $list);

        }

        $total_time = (now()->diffInSeconds(session('login_time', now())))/3600;

        $dashboard->data0 = $this->getTotalUsers($list);
        $dashboard->data1 = $this->getTotalUsersActiveLastWeek($list);
        $dashboard->data2 = $this->getTotalUsersAverageHours($list);
        $dashboard->data3 = $this->getTotalUsersTotalHours($list);
        $dashboard->data4 = session('login_time', now());        
        $dashboard->data5 = $total_time;
        $dashboard->data6 = $list;

        return view('businesses.dashboard')->with('dashboard', $dashboard);
    }

    public function getTotalUsers($list)
    {
        $total = User::whereIn('id', $list)->whereActive(1)->count();

        return $total;
    }

    public function getTotalUsersActiveLastWeek($list)
    {
        $total = User::whereIn('id', $list)->whereActive(1)
            ->whereBetween('updated_at',
                [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
            )
            ->count();

        return $total;
    }

    public function getTotalUsersAverageHours($list)
    {
        $total = User::whereIn('id', $list)->whereActive(1)->avg('total_hours');
        if(is_null($total)){
            $total = 0;
        }
        $total = round($total, 2);
        return $total;
    }

    public function getTotalUsersTotalHours($list)
    {
        $total = User::whereIn('id', $list)->whereActive(1)->sum('total_hours');
        if(is_null($total)){
            $total = 0;
        }
        $total = round($total, 2);
        return $total;
    }

    public function getTotalUsersByMonth($year, $month,  $list)
    {
        $total = User::whereIn('id', $list)->whereActive(1)->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();

        return $total;
    }

    public function geTotalUsersWhoTakeACourse($year, $month,  $list)
    {
        $total = CourseFollowup::select('course_id')->whereIn('user_id', $list)->whereYear('updated_at', $year)->whereMonth('updated_at', $month)->distinct('course_id')->count();

        return $total;
    }

}
