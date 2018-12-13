<?php
namespace Megaads\Cliking\Tracking;

use DB;
use Schema;
class Tracking {

    protected $databaseName = 'cliking.sqlite';

    public function __construct() {

    }

    public function tracking($request) {
        try {
            $databasePath = database_path($this->databaseName);
            if (!file_exists($databasePath)) {
                fopen($databasePath, 'w');
            }

            config(['database.connections.cliking' => [
                'driver'   => 'sqlite',
                'database' => $databasePath,
                'prefix' => '',
            ]]);

            if (!Schema::connection('cliking')->hasTable("accesser")) {
                Schema::connection('cliking')->create('accesser', function($table) {
                     $table->bigIncrements('id');
                     $table->string('ip', 100);
                     $table->string('referer', 500);
                     $table->string('user_agent', 5000);
                     $table->string('request_uri', 500);
                     $table->date('day');
                     $table->dateTime('created_at');
                     $table->index(['ip', 'day']);
                });
            }

            $clientIp = $request->server->get('REMOTE_ADDR', '');
            $clientRefer = $request->server->get('HTTP_REFERER', '');
            $clientUserAgent = $request->server->get('HTTP_USER_AGENT', '');
            $requestUri = $request->server->get('REQUEST_URI', '');
            if (!strpos($requestUri, 'images') && !strpos($requestUri, 'tracking')) {
                $date = new \DateTime();
                $day = $date->format('Y-m-d');
                $dataSave = array(
                    'ip' => $clientIp,
                    'referer' => $clientRefer,
                    'user_agent' => $clientUserAgent,
                    'request_uri' => $requestUri,
                    'day'=> $day,
                    'created_at' => $date
                );
                DB::connection('cliking')->table('accesser')->insert($dataSave);
            }
            // $data = DB::connection('cliking')->select("SELECT * FROM `accesser`");
        } catch(Exception $ex) {

        }
    }

}

?>
