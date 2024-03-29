@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Edit Station</h2>

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


    @foreach($EditPageStation as $key => $StationData)
    <form action="{{url('/EditStation')}}" method="POST" name="EditStationForm">
      {{ csrf_field() }}
      <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-3 control-label">Station Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="stationname" id="stationname" class="form-control" value="{{$StationData->stationname}}" required/>
              <input type="hidden" name="stationid" id="stationid" class="form-control" value="{{$StationData->stationid}}" required/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Description <span class="required">*</span></label>
            <div class="col-sm-9">
              <textarea name="stationdescription" id="stationdescription" rows="5" class="form-control" placeholder="Activity Description" required>{{$StationData->stationdescription}}</textarea>
            </div>
          </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Add Station</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>

    </form>

    @endforeach

    @if (session('messageForStation'))
      <div class="alert alert-success">
        {{ session('messageForStation') }}
      </div>
    @endif


  </section>
@stop
