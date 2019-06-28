@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Location / {{ $branchname }} </h2>

      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/CompanyList')}}"><span>Company List</span></a></li>
          <li> <a href="{{url('/BranchList',request()->route('companyid'))}}"><span>Branch List</span></a></li>
          <li> <a href="{{url('/LocationList',[request()->route('companyid'), request()->route('branchid')])}}"><span>Location List</span></a></li>
        </ol>
      </div>


    </header>

    <a href="{{url('/CreateLocation',[request()->route('companyid'), request()->route('branchid')])}}" ><i class="glyphicon glyphicon-flash"></i> Add New Location</a>

    <br>

    <br>

    <div class="panel-body">



      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Name</th>
          <th style=" text-align: center; ">Station</th>
          <th class="hidden-xs">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($LocationList as $key => $Location)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$Location->branchlocationname}}</td>
            <td style=" text-align: center; ">
              <a href="{{url('/StationList',[request()->route('companyid'), request()->route('branchid'), $Location->branchlocationid])}}">
                <i class="glyphicon glyphicon-barcode"></i></a>
            </td>
            <td>
              <a href="{{url('/EditPageLocation',[request()->route('companyid'), request()->route('branchid'), $Location->branchlocationid])}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteLocation',[request()->route('companyid'), request()->route('branchid'), $Location->branchlocationid])}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop