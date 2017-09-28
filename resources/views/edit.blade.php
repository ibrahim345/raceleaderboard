@extends('layouts.app')


@section('content')

<br></br>

                          <div align="center">
                          <h1><p style="font-family: Impact, fantasy; font-size:26pt;"><strong>EDIT RUNNER</strong></p></h1>
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


                       {!! Form::open() !!}

                      <!-- Title form input -->
                      <div class="form-group">
                          {!! Form::label('firstname', 'First Name:') !!}
                          {!! Form::text('firstname', $RunnerData->firstname, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                          {!! Form::label('lastname', 'Last Name:') !!}
                          {!! Form::text('lastname', $RunnerData->lastname, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                          {!! Form::label('email', 'Email:') !!}
                          {!! Form::text('email', $RunnerData->email, ['class' => 'form-control']) !!}
                      </div>
                      <!-- Content form input -->
                      <div class="form-group">
                          {!! Form::label('dob', 'dob:') !!}
                          {!! Form::text('dob', $RunnerData->dob, ['class' => 'form-control']) !!}
                      </div>


                    {{ Form::submit('UPDATE ENTRY', array('class' => 'btn btn-primary btn-sm')) }}

                    {!! Form::close() !!}
               
        </div>
        <!-- /.row -->

</div>
@endsection
