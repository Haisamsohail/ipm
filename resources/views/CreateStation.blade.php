@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Create Station</h2>
    </header>



    <form action="{{url('/AddStationDB')}}" method="POST" name="AddStationForm">
      {{ csrf_field() }}
      <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-3 control-label">Station Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="stationname" id="stationname" class="form-control" required/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Description <span class="required">*</span></label>
            <div class="col-sm-9">
              <textarea name="stationdescription" id="stationdescription" rows="5" class="form-control" placeholder="Activity Description" required></textarea>
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
    @if (session('messageForStation'))
      <div class="alert alert-success">
        {{ session('messageForStation') }}
      </div>
    @endif


  </section>
@stop
