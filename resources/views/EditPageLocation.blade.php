@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Update Location</h2>

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

    @foreach($EditPageLocation as $key => $LocationData)
    <form action="{{url('/EditLocation')}}" method="POST" name="EditLocationForm">
      {{ csrf_field() }}
      <div class="panel-body">

        <div class="form-group">
          <label class="col-sm-3 control-label">Location Name <span class="required">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="branchlocationname" id="branchlocationname" class="form-control" value="{{$LocationData->branchlocationname}}" required/>
            <input type="hidden" name="companyid" id="companyid" class="form-control" value="{{request()->route('companyid')}}" required/>
            <input type="hidden" name="branchid" id="branchid" class="form-control" value="{{request()->route('branchid')}}" required/>
            <input type="hidden" name="branchlocationid" id="branchlocationid" class="form-control" value="{{request()->route('branchlocationid')}}" required/>
          </div>
        </div>

      </div>

      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-9 col-sm-offset-3">
            <button class="btn btn-primary">Update Location</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </div>
        </div>
      </footer>

    </form>

    @endforeach


    @if (session('messageForActivity'))
      <div class="alert alert-success">
        {{ session('messageForActivity') }}
      </div>
    @endif


  </section>
@stop
