@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    
            <div class="box-header">
              <h3 class="box-title">SPRINT LEADERBOARD </h3>

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

                        @if(Session::has('time_saved'))
                            <div class="alert alert-success">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-circle-o" aria-hidden="true"></i> {{ Session::get('time_saved') }}
                          </div>                  
                         @endif 

  @if (count($TopFastestTime)) 

            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                            <thread>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>DOB</th>
                              <th>Fastest Time </th>
                              <th>Manage</th>
                            </tr>
                           </thread>


                             @foreach($TopFastestTime as $key => $AllFastTimes)
                             <thread>
                                   <tr>
                                     <td>{{ $AllFastTimes->firstname }}</th>
                                     <td>{{ $AllFastTimes->lastname }}</th>
                                     <td>{{ $AllFastTimes->email }}</th>
                                     <td>{{ $AllFastTimes->dob }}</th>
                                     <td>{{ $AllFastTimes->fastesttime }}</th>
                                     <td>{{ Form::open(['route' => ['runners', $AllFastTimes->id], 'method' => 'delete']) }}
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
                                   <strong><h3><b>NO SPRINT TIMES RECORDED!</b></h3></strong></p>
                                 </div>
  @endif   

             </table>
            </div>
   </div>
</div>


        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
                 <div class="panel-body">
                                <div class="box-header">
                                  <h3 class="box-title">INPUT TIME </h3>

                                  <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                    </div>
                                  </div>
                                </div>


                                 <div class="box-body table-responsive no-padding">
                                   <table class="table table-hover">
                                        <thread>
                                          <th>Runner</th>
                                          <th>Time</th>
                                          <th>Manage</th>
                                        </tr>
                                       </thread>

                            {!! Form::open() !!}
                                         <thread>
                                               <tr>
                                                 <td> {!! Form::select('runner', $ListRunners, null) !!}</th>
                                                 <td> {!! Form::text('time', null, ['class' => 'form-control']) !!}</th>
                                                 <td>{{ Form::submit('SAVE', array('class' => 'btn btn-info')) }}</th>
                                               </tr>
                                            </thread>                                                                        
                             {!! Form::close() !!}
                         </table>
                        </div>
                </div>
            </div>

        </div>       
        
        </div>
    </div>
</div>
@endsection
