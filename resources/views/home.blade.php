@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Apply for a holiday Leave
                        <a href="{{route('holiday.frontend')}}" class="btn btn-success">Index</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('holiday.store') }}">
                            @csrf

                            <div class="form-group row">
                                {!! Form::label('requested_by', 'User ID: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                                <br>
                                <div class="col-sm-10">
                                    <input type="text" id="requested_by" name="requested_by" value="{{auth()->user()->id}}" class="form-control" readonly><br>
                                    @error('requested_by')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('name', 'Name: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                                <br>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{auth()->user()->name}}" class="form-control" readonly><br>
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>




                      <label for="vacation_start_date">Vacation-Start-Date</label><br>
                      <input type="datetime-local" id="vacation_start_date" name="vacation_start_date"  >
                      <br>

                      <label for="vacation_end_date">Vacation-End-Date</label><br>
                      <input type="datetime-local" id="vacation_end_date" name="vacation_end_date"  >

                      <button type="submit" class="btn btn-primary">Submit</button>


</form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .required{
            color: red;
        }
    </style>
@endsection




