@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Applied Station / {{ $branchlocationname }} </h2>

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
          <li> <a href="{{url('/StationApplyList',[request()->route('companyid'), request()->route('branchid'), request()->route('branchlocationid')])}}"><span>Apply Station List</span></a></li>
        </ol>
      </div>


    </header>

    <a href="{{url('/CreateStationApply',[request()->route('companyid'), request()->route('branchid'), request()->route('branchlocationid')])}}" ><i class="glyphicon glyphicon-flash"></i> Apply Station</a>

    <br>

    <br>

    <div class="panel-body">



      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Station</th>
          <th>Apply Number</th>
          <th style=" text-align: center; ">Qr Code</th>
          <th class="hidden-xs">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($StationApplyList as $key => $StationApply)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$StationApply->stationname}}</td>
            <td> {{$StationApply->stationapplyno}}</td>
            <td style=" text-align: center; ">

              {{--{!! QrCode::size(100)->generate(request()->route('branchlocationid').'/'.$StationApply->stationapplyid.'/'.$StationApply->stationid); !!}--}}

              {!! QrCode::size(100)->generate($StationApply->stationapplyid); !!}

            </td>
            <td >
              <a href="{{url('/EditPageStationApply',[request()->route('companyid'), request()->route('branchid'), request()->route('branchlocationid'), $StationApply->stationapplyid])}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteStationApply',[request()->route('companyid'), request()->route('branchid'), request()->route('branchlocationid'), $StationApply->stationapplyid])}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop