@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Create Branch</h2>
    </header>


    <form action="{{url('/AddBranchDB')}}" method="POST" name="AddBranchForm">
      {{ csrf_field() }}
      <div class="panel-body">



          <div class="form-group">
            <label class="col-sm-3 control-label"> Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="branchname" id="branchname" class="form-control" required/>
              <input type="hidden" name="companyid" id="companyid" class="form-control" value="{{request()->route('companyid')}}" required/>
            </div>
          </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"> Location<span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="branchlocation" id="branchlocation" class="form-control" required/>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label"> Address <span class="required">*</span></label>
          <div class="col-sm-9">
              <input type="text" name="branchaddress" id="branchaddress" class="form-control" required/>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label"> Phone<span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="branchphone" id="branchphone" class="form-control" required/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"> Email <span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="branchemail" id="branchemail" class="form-control" required/>
          </div>
        </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Add Branch</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>

    </form>

  </section>
@stop
