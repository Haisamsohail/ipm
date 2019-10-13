@extends('master')

@section('content')

  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Trend Report</h2>
      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/TrendReport')}}"><span>Trend Report</span></a></li>
        </ol>
      </div>
    </header>

      <form action="{{url('/SearchTrendReportData')}}" method="POST" name="SearchActivityReportForm">
      {{ csrf_field() }}

      <div class="panel-body">

        <div class="form-group">

            <div class="col-md-5">
              Select Company<span class="required"> *</span>
              <br>
              <select data-plugin-selectTwo class="form-control populate" name="companyid" id="companyid" required>
                <option value="">Select Company</option>
                @foreach($CompanyList as $key => $Company)
                  <option value="{{$Company->companyid}}">{{$Company->companyname}}</option>
                @endforeach
              </select>
            </div>

          <div class="col-md-3">
            From - Till<span class="required"> *</span>
            <br>
              <input type="text" name="daterange"  class="form-control" />
          </div>
          <div class="col-md-4">
            Select Location<span class="required"> *</span>
            <br>
            <select data-plugin-selectTwo class="form-control populate" name="branchlocationid" id="branchlocationid" required>
              <option value="">Select Location</option>

            </select>
          </div>

        </div>
      </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-2 col-sm-offset-10">
              <button class="btn btn-primary" >Search</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>
    </form>

    @if(isset($StationListOnSearch))
      <h4>{{ $CompanyName}}</h4>
      <ul class="nav nav-tabs">
        @foreach($StationListOnSearch as $key => $Station)
          <li><a data-toggle="tab" href="#{{$Station->stationid}}">{{$Station->stationname}}</a></li>
        @endforeach
      </ul>

      <div class="tab-content">


        @foreach($StationListOnSearch as $key => $Station)
          <div id="{{$Station->stationid}}" class="tab-pane fade">
            <h3>{{$Station->stationname}}</h3>

              {{--{{dd($DataIntoArrayTemp)}}--}}

            @foreach($DataIntoArrayTemp[$Station->stationid]  as $brancLocationID => $brancLocationData)
              <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr style=" background: #86ad55; color: white; ">
                  <th>Location</th>
                  <th>Station Number</th>
                    @foreach($ProductHeading[$Station->stationid]  as $HeadingIndex => $Heading)
                    <th>
                        {{$Heading}}
                    </th>
                    @endforeach
                </tr>
                </thead>
                <tbody style=" text-align: center; ">
                {{--{{dd($CountActivityArrayIntoArray)}}--}}
                    @php
                                $rowCounter = 1;
                                $Counts = [];
                                 $OneOrZero = 0;
                    @endphp
                    @foreach($brancLocationData as $brancLocationDataSingle)
                      <tr>
                        @if($rowCounter == 1)
                        <td style=" text-align: center; vertical-align: middle; " rowspan="{!! count($brancLocationData) !!}">{{$brancLocationDataSingle[3]}}</td>
                        @endif
                            <td>{{$brancLocationDataSingle[5]}} </td>



                            @foreach($ProductHeading[$Station->stationid]  as $HeadingIndex => $Heading)
                                <td>
                                        @foreach($CountActivityArrayIntoArray[$brancLocationDataSingle[6]]  as $CountActivityIndex => $CountActivitystationid)
                                            @if($HeadingIndex== $CountActivityIndex)
                                                @php
                                                        if($OneOrZero == 0)
                                                        {
                                                            $Counts[$HeadingIndex] = $CountActivitystationid;
                                                        }
                                                        else
                                                        {
                                                            $Counts[$HeadingIndex] = $CountActivitystationid +  $Counts[$HeadingIndex];
                                                        }

                                                @endphp
                                                {{$CountActivitystationid}}
                                            @endif

                                        @endforeach
                                    </td>
                                    @php
                                @endphp
                            @endforeach

                      </tr>

                      @php
                        $rowCounter++;
                      @endphp
                      @php
                          $OneOrZero++;
                      @endphp

                    @endforeach

                {{--{{dd($Counts)}}--}}
                    <tr style="background: #86ad55; color: white;">
                        <td colspan="2" style=" text-align: center; vertical-align: middle; ">Count</td>

                        @foreach($ProductHeading[$Station->stationid]  as $HeadingIndex => $Heading)
                            <td>
                                {{$Counts[$HeadingIndex]}}
                            </td>
                        @endforeach
                    </tr>
                </tbody>
              </table>
              <br>
            @endforeach
          </div>
        @endforeach
      </div>
    @endif




  <script type="text/javascript">
      $(document).ready(function()
      {
          $("#companyid").change(function()
          {
              $('#StationApplyBtn').prop("disabled", true);
              var companyid = $(this).val();
              //..  alert(companyid);
              $.ajax(
                  {
                      type:'post',
                      url:'/ipm/GetLocations',
                      data:{companyid:companyid},
                      success:function(data)
                      {
                          //..  console.log(data);
                          var $branchlocationid = $("#branchlocationid");
                          $branchlocationid.empty();
                          $branchlocationid.append($("<option />").val('').text('Select location'));
                          $branchlocationid.append($("<option />").val('All').text('All location'));
                          $.each(data, function() {
                          $branchlocationid.append($("<option />").val(this.branchlocationid).text(this.branchlocationname));
                          });
                      },
                      headers:
                          {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                  });
          });
      });
  </script>

  </section>
@stop
