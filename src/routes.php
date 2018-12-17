<?php

Route::get('logger', 'Megaads\Cliking\Controllers\ReportController@index')->name('logger');
Route::get('logger-day-{day}', 'Megaads\Cliking\Controllers\ReportController@loggerByDay')->name('logger-by-day');
Route::get('logger-ip-{ip}-day-{day}', 'Megaads\Cliking\Controllers\ReportController@loggerByDayAndIp')->name('logger-by-day-and-ip');
