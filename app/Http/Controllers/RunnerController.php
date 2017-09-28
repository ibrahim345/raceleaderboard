<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Input;
use Redirect;
use Session;
use App\RunnerModel;
use App\Http\Requests;

class RunnerController extends Controller
{
      // Method for creating new runners to database
  public function store()
  {
      $rules = array(

        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'dob' => 'required',
      );

      $validator = Validator::make(Input::all(), $rules);
        if ($validator-> fails())
            {
              return redirect('create')
              ->withErrors($validator)
              ->withInput();
            }
        else
            {
              $newrunner = new \App\RunnerModel;
              $newrunner->firstname = Input::get('firstname');
              $newrunner->lastname = Input::get('lastname');
              $newrunner->email = Input::get('email');
              $newrunner->dob = Input::get('dob');

              $newrunner -> save();

              Session::flash('runner_saved', 'New Runner Saved!');
              return Redirect::to('create');
            }
    }




    // Method for retrieving and showing all runners on runners view
  public function GetRunners(){
    $AllRunners =   \App\RunnerModel::Paginate(10);
    return view('runners')->with ('AllRunners', $AllRunners);
  }





  // Method for deleting a runners entry on contacts view
    public function DeleteRunner($id)
    {
      RunnerModel::destroy($id);

      Session::flash('runner_delete', 'Runner Deleted!');
      return Redirect::to('runners');
    }





// Method for editing runners on runners view
    public function EditRunner($id)
    {
      $RunnerData = RunnerModel::findOrFail($id);
      return view('edit')->with('RunnerData', $RunnerData);
    }




    // Method for updating runners details on runners edit  view
    public function UpdateRunner($id, Request $request)
    {
       $UpdatedData = RunnerModel::findOrFail($id);

       $this->validate($request, [
          'firstname' => 'required',
          'lastname' => 'required',
          'email' => 'required',
          'dob' => 'required',
        ]);

        $input = $request->all();
        $UpdatedData->fill($input)->save();

        Session::flash('runner_updated', 'Runner Has Been Updated!');
        return Redirect::to('runners');
      }
}
