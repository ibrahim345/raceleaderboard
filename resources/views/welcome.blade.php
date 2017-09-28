@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                         <div class="box-header">
                              <h3 class="box-title">100M SPRINT LEADERBOARD </h3>

                              <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                </div>
                              </div>
                            </div>

                                   

                  @if (count($FastestTime)) 

                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                            <thread>
                                              <th>First Name</th>
                                              <th>Last Name</th>
                                              <th>Email</th>
                                              <th>DOB</th>
                                              <th>Fastest Time</th>
                                            </tr>
                                           </thread>


                                             @foreach($FastestTime as $key => $AllTimes)
                                             <thread>
                                                   <tr>
                                                     <td>{{ $AllTimes->firstname }}</th>
                                                     <td>{{ $AllTimes->lastname }}</th>
                                                     <td>{{ $AllTimes->email }}</th>
                                                     <td>{{ $AllTimes->dob }}</th>
                                                     <td>{{ $AllTimes->fastesttime }}</th>
                                                   </tr>
                                                </thread>
                                             @endforeach
                                         

                  @else  
                                                 <div align="center">
                                                   <br></br>
                                                   <strong><h3><b>NO SPRINT TIMES AT THE MOMENT!</b></h3></strong></p>
                                                 </div>
                  @endif   

                             </table>
                            </div>
                   </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
    function autoRefresh()
    {
        window.location = window.location.href;
    }
     setInterval('autoRefresh()', 5000);
    </script>


@endsection
