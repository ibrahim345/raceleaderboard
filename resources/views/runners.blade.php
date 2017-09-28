@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                   

<div class="box-header">
              <h3 class="box-title">Preview All Runners <small>(<a href='/create'>Enter New Runner</a>)</small></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>

                     @if(Session::has('runner_delete'))
                             <div class="alert alert-danger">
                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-trash" aria-hidden="true"></i> {{ session('runner_delete') }}
                             </div>
                         @endif



                        @if(Session::has('runner_updated'))
                            <div class="alert alert-success">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-circle-o" aria-hidden="true"></i> {{ Session::get('runner_updated') }}
                          </div>                  
                         @endif 



  @if (count($AllRunners)) 

            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                            <thread>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>DOB</th>
                              <th>Change</th>
                              <th>Manage</th>
                            </tr>
                           </thread>


                             @foreach($AllRunners as $key => $allrunners)
                             <thread>
                                   <tr>
                                     <td>{{ $allrunners->firstname }}</th>
                                     <td>{{ $allrunners->lastname }}</th>
                                     <td>{{ $allrunners->email }}</th>
                                     <td>{{ $allrunners->dob }}</th>
                                     <td><a href ="/runners/edit/{{$allrunners->id}}" class ='btn btn-info btn-sm'><i class="fa fa-pencil-square-o"></i> Edit</a></th>
                                     <td>{{ Form::open(['route' => ['runners', $allrunners->id], 'method' => 'delete']) }}
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                        {{ Form::close() }} 
                                     </th>
                                   </tr>
                                </thread>
                             @endforeach
                         

  @else  
                                 <div align="center">
                                   <br></br>
                                   <strong><h3><b>NO RUNNER ENTRIES AVAILABLE!</b></h3></strong></p>
                                    <a href ="/create"><p><strong><h3><u>CREATE</u></a> YOUR FIRST RUNNER ENTRY!</h3></strong></p>
                                 </div>
  @endif   

             </table>
                                <div align="center"> 
                                   {!! $AllRunners->render() !!} 
                                </div>
            </div>


</div>
@endsection
