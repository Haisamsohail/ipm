@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Edit Company</h2>
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


    @foreach($EditPageCompany as $key => $CompanyData)
      <form action="{{url('/EditCompany')}}" method="POST" name="EditCompanyForm">
        {{ csrf_field() }}
        <div class="panel-body">

          <div class="form-group">
            <label class="col-md-3 control-label">Industry Type <span class="required"> *</span></label>

            <div class="col-md-6">
              <select data-plugin-selectTwo class="form-control populate" name="companyindustrytypeid" id="companyindustrytypeid" required>
                <option value="">Select Type</option>
                @foreach($IndustryList as $key => $Industry)
                  <option {{ ($CompanyData->companyindustrytypeid == $Industry->industrytypeid) ? "selected" : "" }}
                  value="{{$Industry->industrytypeid}}">{{$Industry->industrytypename}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-3 control-label">Company Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="companyname" id="companyname" class="form-control" value="{{$CompanyData->companyname}}" required/>
              <input type="hidden" name="companyid" id="companyid" class="form-control" value="{{$CompanyData->companyid}}" required/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">URL <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="companyurl" id="companyurl" class="form-control" value="{{$CompanyData->companyurl}}" required/>
            </div>
          </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Update Company</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>

      </form>

    @endforeach

  </section>
@stop
