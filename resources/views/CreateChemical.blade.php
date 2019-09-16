@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>IPM - Create Chemical</h2>
      <div class="right-wrapper pull-right" style=" margin-right: 50px; ">
        <ol class="breadcrumbs">
          <li>
            <a href="{{url('/welcome')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li> <a href="{{url('/ChemicalList')}}"><span>Chemical List</span></a></li>
        </ol>
      </div>
    </header>


    <form action="{{url('/AddChemicalDB')}}" method="POST" name="AddChemicalForm">
      {{ csrf_field() }}
      <div class="panel-body">

        {{--<div class="form-group">--}}
            {{--<label class="col-md-3 control-label">Industry Type <span class="required"> *</span></label>--}}

            {{--<div class="col-md-6">--}}
              {{--<select data-plugin-selectTwo class="form-control populate" name="companyindustrytypeid" id="companyindustrytypeid" required>--}}
                {{--<option value="">Select Type</option>--}}
                {{--@foreach($IndustryList as $key => $Industry)--}}
                  {{--<option value="{{$Industry->industrytypeid}}">{{$Industry->industrytypename}}</option>--}}
                {{--@endforeach--}}
              {{--</select>--}}
            {{--</div>--}}
          {{--</div>--}}


          <div class="form-group">
            <label class="col-sm-3 control-label">Chemical Name <span class="required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="chemicalname" id="chemicalname" class="form-control" required/>
            </div>
          </div>

        </div>

        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary">Add Chemical</button>
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


  </section>
@stop
