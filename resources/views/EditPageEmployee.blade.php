@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Update Employee</h2>

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

    @foreach($EditPageEmployee as $key => $EmployeeData)
    <form action="{{url('/EditEmployee')}}" method="POST" name="EditEmployeeForm">
      {{ csrf_field() }}
      <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-3 control-label">Employee Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="employeename" id="employeename" class="form-control" value="{{$EmployeeData->employeename}}" required/>
              <input type="hidden" name="companyid" id="companyid" class="form-control" value="{{request()->route('companyid')}}" required/>
              <input type="hidden" name="branchid" id="branchid" class="form-control" value="{{request()->route('branchid')}}" required/>
              <input type="hidden" name="employeeid" id="employeeid" class="form-control" value="{{request()->route('employeeid')}}" required/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Designation<span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="employeedesignation" id="employeedesignation" class="form-control" value="{{$EmployeeData->employeedesignation}}" required/>
            </div>
          </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Phone<span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="employeephone" id="employeephone" class="form-control" value="{{$EmployeeData->employeephone}}" required/>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Email<span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="employeeemail" id="employeeemail" class="form-control" value="{{$EmployeeData->employeeemail}}" required/>
          </div>
        </div>


        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Update Employee</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>

    </form>
    @endforeach


  </section>
@stop
