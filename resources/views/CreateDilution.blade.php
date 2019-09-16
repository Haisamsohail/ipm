@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Create Dilution</h2>
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


    <form action="{{url('/AddDilutionDB')}}" method="POST" name="AddDilutionForm">
      {{ csrf_field() }}
      <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-3 control-label">Dilution Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="dilutionname" id="dilutionname" class="form-control" required/>
            </div>
          </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Add Dilution</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>

    </form>
    @if (session('messageForCompany'))
      <div class="alert alert-success">
        {{ session('messageForCompany') }}
      </div>
    @endif


  </section>
@stop
