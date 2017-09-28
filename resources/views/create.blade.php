@extends('layouts.app')


@section('content')

<br></br>

                          <div align="center">
                          <h1><p style="font-family: Impact, fantasy; font-size:26pt;"><strong>NEW RUNNER</strong></p></h1>
                          </div>    

<div class="container">
        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">

<div class="col-md-8 col-md-offset-2">
 
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif


                      @if(Session::has('runner_saved'))
                          <div class="alert alert-success">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('runner_saved') }}  Click <a href ="/runners"> here</a> to see all runners.
                          </div>
                      @endif



                       {!! Form::open() !!}

                      <!-- Title form input -->
                      <div class="form-group">
                          {!! Form::label('firstname', 'First Name:') !!}
                          {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                          {!! Form::label('lastname', 'Last Name:') !!}
                          {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                      </div>


                      <div class="form-group">
                          {!! Form::label('email', 'Email:') !!}
                          {!! Form::text('email', null, ['class' => 'form-control']) !!}
                      </div>
                      <!-- Content form input -->
                      <div class="form-group">
                          {!! Form::label('dob', 'DOB:') !!}
                          {!! Form::text('dob', null, ['class' => 'form-control']) !!}
                      </div>


                    {{ Form::submit('SAVE ENTRY', array('class' => 'btn btn-primary btn-sm')) }}

                    {!! Form::close() !!}
               
        </div>
        <!-- /.row -->

</div>
@endsection
