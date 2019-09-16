@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Dilution List</h2>

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

    <div class="panel-body">

      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($DilutionList as $key => $Dilution)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$Dilution->dilutionname}}</td>
            <td>
              <a href="{{url('/EditPageDilution',$Dilution->dilutionid)}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteDilution',$Dilution->dilutionid)}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </section>
@stop