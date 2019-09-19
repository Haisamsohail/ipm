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

          <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
            <tr>
              <th>Location</th>
              <th>Station Number</th>
              <th>Activity 1</th>
              <th>Activity 2</th>
              <th>Activity 3</th>
              <th>Activity 4</th>
              <th>Activity 5</th>
              <th>Activity 6</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="2" style=" text-align: center; vertical-align: middle; ">MD Room</td>
                <td>101</td>
                <td>4</td>
                <td>5</td>
                <td>0</td>
                <td>8</td>
                <td>3</td>
                <td>4</td>
              </tr>
              <tr>
                <td>101</td>
                <td>4</td>
                <td>5</td>
                <td>0</td>
                <td>8</td>
                <td>3</td>
                <td>4</td>
              </tr>
              <tr style=" background: #86ad55; color: white; ">
                <td colspan="2" style=" text-align: center; vertical-align: middle; ">Count</td>
                <td>5</td>
                <td>0</td>
                <td>8</td>
                <td>8</td>
                <td>3</td>
                <td>4</td>
              </tr>
            </tbody>
          </table>


          <br>
          <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
            <tr>
              <th>Location</th>
              <th>Station Number</th>
              <th>Activity 1</th>
              <th>Activity 2</th>
              <th>Activity 3</th>
              <th>Activity 4</th>
              <th>Activity 5</th>
              <th>Activity 6</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td rowspan="3" style=" text-align: center; vertical-align: middle; ">Canteen</td>
              <td>101</td>
              <td>4</td>
              <td>5</td>
              <td>0</td>
              <td>8</td>
              <td>3</td>
              <td>4</td>
            </tr>
            <tr>
              <td>101</td>
              <td>4</td>
              <td>5</td>
              <td>0</td>
              <td>8</td>
              <td>3</td>
              <td>4</td>
            </tr>
            <tr>
              <td>101</td>
              <td>4</td>
              <td>5</td>
              <td>0</td>
              <td>8</td>
              <td>3</td>
              <td>4</td>
            </tr>
            </tbody>
          </table>


        </div>
      @endforeach
    </div>
  </section>
@stop
