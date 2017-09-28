<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\RunnerModel;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListRunners = \App\RunnerModel::pluck('firstname', 'id');
        $TopFastestTime = DB::table('scores')     
                ->select('runners.id',  'runners.firstname', 'runners.lastname',  'runners.email', 'runners.dob', 'scores.runner_id', 'scores.time as fastesttime')
                ->join('runners', 'runners.id', '=', 'scores.runner_id') 
                ->orderBy('fastesttime', 'ASC')  
                ->where('scores.created_at', '>=', \Carbon\Carbon::today())->get();

 
        return view('home')
                ->with('ListRunners',$ListRunners)
                ->with('TopFastestTime',$TopFastestTime);
    }
}
