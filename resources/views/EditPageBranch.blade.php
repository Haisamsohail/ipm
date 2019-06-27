@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Update Branch</h2>
    </header>

    @foreach($EditPageBranch as $key => $BranchData)
    <form action="{{url('/EditBranch')}}" method="POST" name="EditBranchForm">
      {{ csrf_field() }}
      <div class="panel-body">



          <div class="form-group">
            <label class="col-sm-3 control-label"> Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="branchname" id="branchname" class="form-control" value="{{$BranchData->branchname}}" required/>
              <input type="hidden" name="companyid" id="companyid" class="form-control" value="{{request()->route('companyid')}}" required/>
              <input type="hidden" name="branchid" id="branchid" class="form-control"value="{{$BranchData->branchid}}" required/>
            </div>
          </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"> Location<span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="branchlocation" id="branchlocation" value="{{$BranchData->branchlocation}}" class="form-control" required/>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label"> Address <span class="required">*</span></label>
          <div class="col-sm-9">
              <input type="text" name="branchaddress" id="branchaddress" value="{{$BranchData->branchaddress}}" class="form-control" required/>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label"> Phone<span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="branchphone" id="branchphone" value="{{$BranchData->branchphone}}" class="form-control" required/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"> Email <span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="branchemail" id="branchemail" value="{{$BranchData->branchemail}}" class="form-control" required/>
          </div>
        </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Update Branch</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>

      @endforeach

    </form>

  </section>
@stop
