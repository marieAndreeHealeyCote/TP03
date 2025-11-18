<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\Log;

class LogController
{
    public function index()
    {
        $log = new Log;
        $selectLog = $log->select();


        if ($selectLog) {

            $listeLogs = [];
            foreach ($selectLog as $tmp) {

                $listeLogs[] = [
                    'page' => $tmp['page'],
                    'username' => $tmp['username'],
                    'date' => $tmp['date'],
                ];
            }
            return View::render("log/index", ['listeLogs' => $listeLogs]);
        }

        return View::render('error');
    }
}
