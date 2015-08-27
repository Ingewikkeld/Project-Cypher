<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function getAction()
    {
        return view('template/front/pages/dashboard');
    }

    public function apiGetAction()
    {
        return json_encode(['some data' => 'and some value']);

    }

}
