@extends('backend.layout.backend')

@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">{{$title}}-Form
                    <a href="{{route($route .'index')}}" class="btn btn-success">List</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($data['row'], ['route' => [$route.'update', $data['row']->id ]]) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            @csrf

            <div class="card-body">


                <div class="form-group row">
                    {!! Form::label('status', 'Status: <span class="required">*</span>',['class' => 'col-form-label'],false); !!}
                    <div class="col-sm-10">

                        {!! Form::radio('status', '0'); !!}Pending
                        {!! Form::radio('status','1'); !!}Accepted
                        {!! Form::radio('status','2'); !!}Rejected
                        @error('status')
                        <p class="text-danger">{{$message}}</p>
                        @enderror




                    </div>


                    <input type="text" hidden name="leave_taken" id="leave_taken" value=<?php

                                                                                     $sdate=$data['row']->vacation_start_date;
                                                                                     $edate=$data['row']->vacation_end_date;
                                                                                     $date1=new DateTime($sdate);
                                                                                     $date2=new DateTime($edate);
                                                                                     $interval=$date1->diff($date2);
                                                                                     $days=$interval->format('%a');

                                                                                     echo$days;
                                                                                     ?>

                    >

                </div>





                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('csss')
    <style>
        .required{
            color: red;
        }
    </style>
@endsection


