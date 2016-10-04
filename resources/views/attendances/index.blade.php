@extends('layouts.app2')

@section('content')
    <!-- This is the styling for the table because the text is white by default. -->
    <style type="text/css">
        th, td{
            color:black;
        }
    </style>
    <!-- This is the admin dashboard stuff with the colum sizing. -->
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">Admin Acess Dashboard</div>
            <div class="panel-body">                   
                <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('AdminController@create')}}">Admins</a>
                <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('EmployeeController@index')}}">Employee</a>
                <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('MentorController@index')}}">Mentor</a>
            </div>
        </div>
    </div>

    <!-- The code to list all the students and other people stuff that can admin can see and create.-->
    <div>    
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>lastName</th>
                <th>firstName</th>
                <th>Current Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Primary Email</th>
                <th>phone</th>
                <th>school</th>
                <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                        <td>{{ $attendance->lastName }}</td>
                        <td>{{ $attendance->firstName }}</td>
                        <td>{{ $attendance->address }}</td>
                        <td>{{ $attendance->city }}</td>
                        <td>{{ $attendance->state }}</td>
                        <td>{{ $attendance->zip }}</td>
                        <td>{{ $attendance->email }}</td>
                        <td>{{ $attendance->phone }}</td>
                        <td>{{ $attendance->school }}</td>
                        <td><a href="{{url('attendances',$attendance->id)}}" class="btn btn-primary">Read</a></td>
                        <td><a href="{{route('attendances.edit',$attendance->id)}}" class="btn btn-warning">Update</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route'=>['attendances.destroy', $attendance->id], 'onSubmit'=> 'if(!confirm("\n\nAre you Sure you want to delete the admin?")){return false;}'])!!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        <?php $bool = 1;?>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection