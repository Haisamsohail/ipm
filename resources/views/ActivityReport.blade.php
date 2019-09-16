@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Activity Report</h2>
      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/ActivityReport')}}"><span>Activity Report</span></a></li>
        </ol>
      </div>
    </header>


    <form action="{{url('/SearchActivityReport')}}" method="POST" name="SearchActivityReportForm">
      {{ csrf_field() }}

      <div class="panel-body">
        <div class="form-group">

            <div class="col-md-3">
              Select Company<span class="required"> *</span>
              <br>
              <select data-plugin-selectTwo class="form-control populate" name="companyindustrytypeid" id="companyindustrytypeid" required>
                <option value="">Select Company</option>
                @foreach($CompanyList as $key => $Company)
                  <option value="{{$Company->companyid}}">{{$Company->companyname}}</option>
                @endforeach
              </select>
            </div>

          <div class="col-md-3">
            From<span class="required"> *</span>
            <br>
            <input type="date" name="DateFrom" id="DateFrom" class="form-control" required/>
          </div>

          <div class="col-md-3">
            Till<span class="required"> *</span>
            <br>
            <input type="date" name="DateTill" id="DateTill" class="form-control" required/>
          </div>

          <div class="col-md-3">
            Select Location<span class="required"> *</span>
            <br>
            <select data-plugin-selectTwo class="form-control populate" name="companyindustrytypeid" id="companyindustrytypeid" required>
              <option value="">Select Location</option>
              @foreach($CompanyList as $key => $Company)
                <option value="{{$Company->companyid}}">{{$Company->companyname}}</option>
              @endforeach
            </select>
          </div>

        </div>
      </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-2 col-sm-offset-10">
              <button class="btn btn-primary">Search</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>
    </form>


    <ul class="nav nav-tabs">
      @foreach($StationList as $key => $Station)
        <li><a data-toggle="tab" href="#{{$Station->stationid}}">{{$Station->stationname}}</a></li>
      @endforeach
    </ul>
    <div class="tab-content">
      @foreach($StationList as $key => $Station)
        <div id="{{$Station->stationid}}" class="tab-pane fade">
          <h3>{{$Station->stationname}}</h3>
          <p>Some content.</p>
        </div>
      @endforeach
    </div>

  </section>
@stop
