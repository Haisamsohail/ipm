@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Update Activity</h2>
    </header>

    @foreach($EditPageActivity as $key => $ActivityData)
    <form action="{{url('/EditActivity')}}" method="POST" name="EditActivityForm">
      {{ csrf_field() }}
      <div class="panel-body">

        <div class="form-group">
          <label class="col-md-3 control-label">Type <span class="required"> *</span></label>

          <div class="col-md-6">
            <select data-plugin-selectTwo class="form-control populate" name="activitytype" id="activitytype" required>
              <option value="">Select Type</option>
              <option value="CheckBox">CheckBox</option>
              <option value="Input">Input</option>
              <option value="Observation">Observation</option>

            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Activity Name <span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="activityName" id="activityName" value="{{$ActivityData->activityName}}" class="form-control" required/>
            <input type="hidden" name="activityid" id="activityid" class="form-control"value="{{$ActivityData->activityid}}" required/>
            <input type="hidden" name="stationid" id="stationid" class="form-control" value="{{$ActivityData->stationid}}" required/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Description <span class="required">*</span></label>
          <div class="col-sm-9">
            <textarea name="activitydescription" id="activitydescription" rows="5" class="form-control" placeholder="Activity Description" required>{{$ActivityData->activitydescription}}</textarea>
          </div>
        </div>

      </div>

      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-9 col-sm-offset-3">
            <button class="btn btn-primary">Update Activity</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </div>
        </div>
      </footer>

    </form>

    @endforeach


    @if (session('messageForActivity'))
      <div class="alert alert-success">
        {{ session('messageForActivity') }}
      </div>
    @endif


  </section>
@stop
