<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @param Request $req
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $req) {
        //dd($req->query('title', 'No hay título'));
        //dd($req);
        return view('test', [
            'title' => $req->query('title', 'No hay título')
        ]);
    }
}
