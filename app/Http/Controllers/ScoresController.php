<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScoresModel;
use App\Http\Requests;
use Validator;
use Input;
use Redirect;
use Session;
use DB;

class ScoresController extends Controller
{
   // Method for storing runner time record to database
  public function storetime(Request $request)
  {
          $rules = array(
          'time' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

       if ($validator-> fails())
              {
                return redirect('/home')
                ->withErrors($validator)
                ->withInput();
              }
       else
            {

              $newtime = new \App\ScoresModel;                   
              $newtime->runner_id = Input::get('runner'); 
              $newtime->time = Input::get('time');  
              $newtime -> save();


              Session::flash('time_saved', 'Runner Time Saved!');
              return Redirect::to('/home');
            } 
  }


  // Method for retrieving runner time record from database
   public function RetrieveTimes()
    {
        $FastestTime = DB::table('scores')     
                ->select('runners.id',  'runners.firstname', 'runners.lastname',  'runners.email', 'runners.dob', 'scores.runner_id', 'scores.time as fastesttime')
                ->join('runners', 'runners.id', '=', 'scores.runner_id') 
                ->orderBy('fastesttime', 'ASC')  
                ->where('scores.created_at', '>=', \Carbon\Carbon::today())->get();

      

        return view('welcome')
                ->with('FastestTime',$FastestTime);
    }
}
