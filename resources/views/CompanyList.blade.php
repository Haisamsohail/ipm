@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Company List</h2>

      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/CompanyList')}}"><span>Company List</span></a></li>
        </ol>
      </div>

    </header>

    <div class="panel-body">

      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Name</th>
          <th>Type</th>
          <th style=" text-align: center; ">Branches</th>
          {{--<th class="hidden-xs">Active</th>--}}
          <th style=" text-align: center; ">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($CompanyList as $key => $Company)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$Company->companyname}}</td>
            <td> {{$Company->industrytypename}}</td>
            <td style=" text-align: center; "> <a href="{{url('/BranchList',$Company->companyid)}}">
                <i class="glyphicon glyphicon-flash"></i></a></td>
            {{--<td>--}}
            {{--@if($Activity->activityactive =='Y')--}}
              {{--Active--}}
            {{--@else--}}
              {{--In Active--}}
            {{--@endif--}}
            {{--</td>--}}
            <td style=" text-align: center; ">
              <a href="{{url('/EditPageCompany',$Company->companyid)}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteCompany',$Company->companyid)}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop