@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Employee / {{ $branchname }} </h2>

      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/CompanyList')}}"><span>Company List</span></a></li>
          <li> <a href="{{url('/BranchList',request()->route('companyid'))}}"><span>Branch List</span></a></li>
          <li> <a href="{{url('/EmployeeList',[request()->route('companyid'), request()->route('branchid')])}}"><span>Employee List</span></a></li>
        </ol>
      </div>


    </header>

    <a href="{{url('/CreateEmployee',[request()->route('companyid'), request()->route('branchid')])}}" ><i class="glyphicon glyphicon-flash"></i> Add New Employee</a>

    <br>

    <br>

    <div class="panel-body">



      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>S.NO</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Phone</th>
          <th>Email</th>
          {{--<th class="hidden-xs">Active</th>--}}
          <th class="hidden-xs">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($EmployeeList as $key => $Employee)
          <tr>
            <td> {{$key  + 1}}</td>
            <td> {{$Employee->employeename}}</td>
            <td> {{$Employee->employeedesignation}}</td>
            <td> {{$Employee->employeephone}}</td>
            <td> {{$Employee->employeeemail}}</td>
            {{--<td>--}}
            {{--@if($Activity->activityactive =='Y')--}}
              {{--Active--}}
            {{--@else--}}
              {{--In Active--}}
            {{--@endif--}}
            {{--</td>--}}
            <td>
              <a href="{{url('/EditPageEmployee',[request()->route('companyid'), request()->route('branchid'), $Employee->employeeid])}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{url('/DeleteEmployee',[request()->route('companyid'), request()->route('branchid'), $Employee->employeeid])}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>

  </section>
@stop