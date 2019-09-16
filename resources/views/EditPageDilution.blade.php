@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Edit Dilution</h2>

      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/DilutionList')}}"><span>Dilution List</span></a></li>
        </ol>
      </div>


    </header>


    @foreach($EditPageDilution as $key => $DilutionData)
    <form action="{{url('/EditDilution')}}" method="POST" name="EditDilutionForm">
      {{ csrf_field() }}
      <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-3 control-label">Dilution Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="dilutionname" id="dilutionname" class="form-control" value="{{$DilutionData->dilutionname}}" required/>
              <input type="hidden" name="dilutionid" id="dilutionid" class="form-control" value="{{$DilutionData->dilutionid}}" required/>
            </div>
          </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Update Dilution</button>
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
