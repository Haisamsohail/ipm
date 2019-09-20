@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Station List</h2>

      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/StationList')}}"><span>Station List</span></a></li>
        </ol>
      </div>


    </header>

    <div class="panel-body">

      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Company</th>
          <th>Branch</th>
          <th>Location</th>
          <th>Station</th>
          <th>Activity</th>
          <th>Activity Type</th>
          <th>Station ID</th>
          <th>Activity ID</th>
          <th>Activity Type</th>
          <th>Checkbox</th>
          <th>Number</th>
          <th>Observation</th>
          <th>Observation Image</th>
          <th>Chemical/th>
          <th>Dialution</th>
          <th>Consumption</th>
          <th>Correctice Number</th>
          <th>Correctic Image</th>
          <th>Correctice Rootcase</th>
          <th>Station ID</th>
          <th>Station ID</th>
          <th>Station ID</th>
        </tr>
        </thead>
        <tbody>
          @foreach($APPInput as $key => $APP)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$APP->companyname}}</td>
            <td> {{$APP->branchname}}</td>
            <td> {{$APP->branchlocationname}}</td>
            <td> {{$APP->stationname}}</td>
            <td> {{$APP->activityName}}</td>
            <td> {{$APP->activitytype}}</td>
            <td> {{$APP->stationid}}</td>
            <td> {{$APP->activityid}}</td>
            <td> {{$APP->activitytype}}</td>
            <td> {{$APP->outputcheckbox}}</td>
            <td> {{$APP->outputnumber}}</td>
            <td> {{$APP->outputobservationtext}}</td>
            <td> <img src="data:image/png;base64,{{$APP->outputobservationImage}}" style=" margin: auto; width: 90px; ">  </td>
            <td> {{$APP->outputfumigationchemicalid}}</td>
            <td> {{$APP->outputfumigationchemicaldai}}</td>
            <td> {{$APP->outputfumigationchemicalconsumption}}</td>
            <td> {{$APP->correcticeactionnumber}}</td>
            <td> {{$APP->correcticeactionimage}}</td>
            <td> {{$APP->correcticeactionrootcase}}</td>
            <td> {{$APP->correcticeactioncorrection}}</td>
            <td> {{$APP->createddate}}</td>

          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop