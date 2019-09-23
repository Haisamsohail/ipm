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
      <style>
        table {
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: 1px solid #ddd;
        }

        th, td {
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
      </style>

    </header>

    <div class="panel-body">
      <div style="overflow-x:auto;">
      <table class="table table-bordered table-striped mb-none" id="example" style="white-space: nowrap;">
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
          <th>Chemical</th>
          <th>Dialution</th>
          <th>Consumption</th>
          <th>Correctice Number</th>
          <th>Correctic Image</th>
          <th>Correctice Rootcase</th>
          <th>Correctice Action</th>
          <th>Inserted ID</th>
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
            <td>
              @if(empty($APP->outputobservationImage))
                N/A
              @else
                <img src="data:image/png;base64,{{$APP->outputobservationImage}}" style="margin: auto;height: 100px;width: 100px;">
              @endif
              </td>
            <td> {{$APP->outputfumigationchemicalid}}</td>
            <td> {{$APP->outputfumigationchemicaldai}}</td>
            <td> {{$APP->outputfumigationchemicalconsumption}}</td>
            <td> {{$APP->correcticeactionnumber}}</td>
            <td>
                @if(empty($APP->correcticeactionimage))
                      N/A
                @else
                      <img src="data:image/png;base64,{{$APP->correcticeactionimage}}" style="margin: auto;height: 100px;width: 100px;">
                @endif
            </td>
            <td> {{$APP->correcticeactionrootcase}}</td>
            <td> {{$APP->correcticeactioncorrection}}</td>
            <td> {{$APP->createddate}}</td>

          </tr>
        @endforeach


        </tbody>
      </table>
      </div>
    </div>

  </section>
@stop