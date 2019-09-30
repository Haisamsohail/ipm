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
          {{--<li> <a href="{{url('/LocationList',[request()->route('companyid'), request()->route('branchid')])}}"><span>Location List</span></a></li>--}}
        </ol>
      </div>


    </header>

    {{--<a href="{{url('/CreateLocation',[request()->route('companyid'), request()->route('branchid')])}}" ><i class="glyphicon glyphicon-flash"></i> Add New Location</a>--}}

    <form action="{{url('/CheckBoxStationApplyDownload')}}" method="POST" name="CheckBoxStationApplyForm">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-lg-3">
          <button type="submit" class="btn btn-info">Download</button>
        </div>
      </div>

    </br>
    <div class="panel-body">
      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Select</th>
          <th>Station</th>
          <th>Station #</th>
          <th>Apply #</th>
          <th>Location</th>
          <th>QR Code</th>
          <th class="hidden-xs">Download</th>
        </tr>
        </thead>
        <tbody>
          @foreach($BStation as $key => $Location)
          <tr>
            <td> {{$key  + 1}}</td>
            <th><input type="checkbox" name="CheckBoxStationApply[]" class="form-control" value="{{ request()->route('companyid').'/'.$Location->stationapplyid}}"></th>
            <td> {{$Location->stationname}}</td>
            <td> {{$Location->stationapplyid}}</td>
            <td> {{$Location->stationapplyno}}</td>
            <td> {{$Location->branchlocationname}}</td>
            <td> {!! QrCode::size(100)->generate($Location->stationapplyid); !!}</td>
            <td style=" text-align: center; ">
              <p style=" text-align: center; vertical-align: middle; line-height: 90px; font-size: 2em; "><a href="{{url('/GenerateLabel',[request()->route('companyid'), $Location->stationapplyid])}}" style=" color: #7ea84a; ">
                  <i class="fa fa-download"></i></a></p>
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>
    </div>
    </form>
  </section>
@stop