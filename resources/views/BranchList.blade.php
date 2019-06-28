@extends('master')
@section('content')

  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Branches / {{ $companyname }} </h2>
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