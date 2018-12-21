<?php

namespace Megaads\Cliking\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;

class ReportController extends BaseController
{
    public function index() {
        $days = DB::connection('cliking')
        ->table('accesser')
        ->select('day')
        ->groupBy('day')
        ->orderBy('day', 'desc')
        ->whereNotNull('day')
        ->where('day', '<>', '')
        ->paginate(7);

        return view('cliking::index', compact('days'));
    }

    public function loggerByDay ($day) {
        $accessGroup = DB::connection('cliking')
        ->table('accesser')
        ->where('day', $day)
        ->groupBy('ip')
        ->select('ip')
        ->addSelect(DB::raw('count(*) as count'))
        ->orderBy('count', 'desc')
        ->paginate(100);

        return view('cliking::logger-by-day', compact(['accessGroup', 'day']));

    }

    public function loggerByDayAndIp ($ip, $day) {
        // print_r($day); die;
        $accessGroup = DB::connection('cliking')
        ->table('accesser')
        ->where('day', $day)
        ->where('ip', $ip)
        ->select('*')
        // ->addSelect(DB::raw('count(*) as count'))
        ->paginate(100);

        return view('cliking::logger-by-day-and-ip', compact(['accessGroup', 'ip',  'day']));

    }
}
