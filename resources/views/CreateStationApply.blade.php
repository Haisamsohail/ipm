@extends('master')

@section('content')

   <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Station Apply</h2>
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
          <li> <a href="{{url('/StationApplyList',[request()->route('companyid'), request()->route('branchid'), request()->route('branchlocationid')])}}"><span>Apply Station List</span></a></li>
        </ol>
      </div>
    </header>


    <form action="{{url('/AddStationApplyDB')}}" method="POST" name="AddStationApplyForm">
      {{ csrf_field() }}
      <div class="panel-body">


          <div class="form-group">
            <label class="col-sm-3 control-label">Station Apply No<span class="required">*</span></label>

            <div class="col-sm-9">
              <input type="number" name="stationapplyno" id="stationapplyno" class="form-control" min="1" required/>
                <label class="col-sm-3 control-label" ><span id="ResutnMessage"></span></label>
              <input type="hidden" name="companyid" id="companyid" class="form-control" value="{{request()->route('companyid')}}" required/>
              <input type="hidden" name="branchid" id="branchid" class="form-control" value="{{request()->route('branchid')}}" required/>
              <input type="hidden" name="branchlocationid" id="branchlocationid" class="form-control" value="{{request()->route('branchlocationid')}}" required/>
            </div>
          </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Station<span class="required">*</span></label>
          <div class="col-md-6">
              <select data-plugin-selectTwo class="form-control populate" name="stationid" id="stationid" required>
                <option value="">Select Type</option>
                @foreach($StationList as $key => $Station)
                  <option value="{{$Station->stationid}}">{{$Station->stationname}}</option>
                @endforeach
              </select>
            </div>
          </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary" id="StationApplyBtn" disabled>Station Apply</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </footer>

    </form>
    @if (session('messageForCompany'))
      <div class="alert alert-success">
        {{ session('messageForCompany') }}
      </div>
    @endif



     <script type="text/javascript">


         $(document).ready(function()
         {
             $("#stationapplyno").change(function()
             {

                 $('#StationApplyBtn').prop("disabled", true);
                 var stationapplyno = $(this).val();
                 var companyid = $("#companyid").val();
                 var branchid = $("#branchid").val();
                 var branchlocationid = $("#branchlocationid").val();
                 //..   alert(stationapplyno +"\n"+ companyid +"\n"+ branchid +"\n"+ branchlocationid );
                 $.ajax(
                 {
                     type:'post',
                     url:'/ipm/CheckStation',
                     data:{stationapplyno:stationapplyno,branchlocationid:branchlocationid },
                     success:function(data)
                     {
                         if (data == "N")
                         {
                             $('#StationApplyBtn').prop("disabled", false);
                             $("#ResutnMessage").html("Station Avaliable").css("color", "#4CAF50");

                         }
                         else
                         {
                             $('#StationApplyBtn').prop("disabled", true);
                             $("#ResutnMessage").html("Station Not Avaliable").css("color", "red");

                         }
                         //alert(data);
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




