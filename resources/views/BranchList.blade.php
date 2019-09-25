@extends('master')
@section('content')

  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Branches / {{ $companyname }} </h2>

      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/CompanyList')}}"><span>Company List</span></a></li>
          <li> <a href="{{url('/BranchList',request()->route('companyid'))}}"><span>Branch List</span></a></li>
        </ol>
      </div>


    </header>

    <a href="{{url('/CreateBranch',request()->route('companyid'))}}" ><i class="glyphicon glyphicon-flash"></i> Add New Branch</a>
    <br><br>

    <div class="panel-body">

      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Branch</th>
          <th>Location</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Employee</th>
          <th>Location</th>
          <th>Station</th>
          <th class="hidden-xs">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($BranchList as $key => $Branch)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$Branch->branchname}}</td>
            <td> {{$Branch->branchlocation}}</td>
            <td> {{$Branch->branchaddress}}</td>
            <td> {{$Branch->branchphone}}</td>
            <td> {{$Branch->branchemail}}</td>
            <td style=" text-align: center; ">
              <a href="{{url('/EmployeeList',[request()->route('companyid'), $Branch->branchid])}}">
                <i class="glyphicon glyphicon-user"></i></a>
            </td>
            <td style=" text-align: center; ">
              <a href="{{url('/LocationList',[request()->route('companyid'), $Branch->branchid])}}">
                <i class="glyphicon glyphicon-home"></i></a>
            </td>
            <td style=" text-align: center; ">
              <a href="{{url('/BStation',[request()->route('companyid'), $Branch->branchid])}}">
                <i class="fa fa-bitbucket"></i></a>
            </td>
            <td>
              <a href="{{url('/EditPageBranch',[request()->route('companyid'), $Branch->branchid])}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteBranch',[request()->route('companyid'), $Branch->branchid])}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop