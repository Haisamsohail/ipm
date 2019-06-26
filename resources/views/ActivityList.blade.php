@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Activity / {{ $stationname }} </h2>
    </header>

    <a href="{{url('/CreateActivity',request()->route('stationid'))}}" ><i class="glyphicon glyphicon-flash"></i> Add New Activity</a>

    <br>

    <br>

    <div class="panel-body">



      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Activity</th>
          <th>Type</th>
          <th>Description</th>
          {{--<th class="hidden-xs">Active</th>--}}
          <th class="hidden-xs">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($ActivityList as $key => $Activity)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$Activity->activityName}}</td>
            <td> {{$Activity->activitytype}}</td>
            <td> {{$Activity->activitydescription}}</td>
            {{--<td>--}}
            {{--@if($Activity->activityactive =='Y')--}}
              {{--Active--}}
            {{--@else--}}
              {{--In Active--}}
            {{--@endif--}}
            {{--</td>--}}
            <td>
              <a href="{{url('/EditPageActivity',[request()->route('stationid'), $Activity->activityid])}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteActivity',[request()->route('stationid'), $Activity->activityid])}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop