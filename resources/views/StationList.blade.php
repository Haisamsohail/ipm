@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Station List</h2>
    </header>

    <div class="panel-body">

      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Station ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Activity</th>
          {{--<th class="hidden-xs">Active</th>--}}
          <th class="hidden-xs">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($StationList as $key => $Station)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$Station->stationid}}</td>
            <td> {{$Station->stationname}}</td>
            <td> {{$Station->stationdescription}}</td>
            <td style=" text-align: center; "> <a href="{{url('/ActivityList',$Station->stationid)}}">
                <i class="glyphicon glyphicon-flash"></i></a></td>
            {{--<td>--}}
            {{--@if($Activity->activityactive =='Y')--}}
              {{--Active--}}
            {{--@else--}}
              {{--In Active--}}
            {{--@endif--}}
            {{--</td>--}}
            <td>
              <a href="{{url('/EditPageStation',$Station->stationid)}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteStation',$Station->stationid)}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop