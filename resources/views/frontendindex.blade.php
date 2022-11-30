@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Index
                        <a href="{{route('home')}}" class="btn btn-success">Home</a>
                    </div>



                    <div class="card-body">

                        <table>
                            <tr>
                                <th>SN</th>
                                <th>User-Name</th>
                                <th>Leave From Date</th>
                                <th>Leave Upto Date</th>
                                <th>Leave Applied Date</th>
                                <th>Status</th>
                            </tr>
                            @foreach($data['row'] as $i=>$holi)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{auth()->user()->name}}</td>
                                <td>{{$holi->vacation_start_date}}</td>
                                <td>{{$holi->vacation_end_date}}</td>
                                <td>{{$holi->created_at}}</td>
                                <td>@if($holi->status ==0)
                                <p text="danger" >Pending</p>
                                    @elseif($holi->status ==1)
                                        <p >Accepted</p>
                                    @else
                                        <p >Rejected</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endsection




