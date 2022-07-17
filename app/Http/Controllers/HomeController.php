<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date=Carbon::now()->format('Y-m-d');
        $waktu=Carbon::now()->format('H:00:00');


        return view('home',[
            'agendas'=>Agenda::select()->wheredate('start_date',$date)->get(),
            'agendasekarang'=>Agenda::select()->wheretime('start_date','>=',$waktu)->orderBy('start_date','desc')->get()->first(),

        ]);

    }
}
