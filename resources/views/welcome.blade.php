@extends('master')

@section('content')


  <section role="main" class="content-body">
    <header class="page-header">
      <h2>Integrated Pest Management</h2>
    </header>

    Welcome Body

  </section>
          <!-- start: page -->
          {{--<div class="row">--}}
            {{--<div class="col-md-6 col-lg-12 col-xl-6">--}}
              {{--<section class="panel">--}}
                {{--<div class="panel-body">--}}
                  {{--<div class="row">--}}
                    {{--<div class="col-lg-8">--}}
                      {{--<div class="chart-data-selector" id="salesSelectorWrapper">--}}
                        {{--<h2>--}}
                          {{--Sales:--}}
                          {{--<strong>--}}
                            {{--<select class="form-control" id="salesSelector">--}}
                              {{--<option value="Porto Admin" selected>Porto Admin</option>--}}
                              {{--<option value="Porto Drupal" >Porto Drupal</option>--}}
                              {{--<option value="Porto Wordpress" >Porto Wordpress</option>--}}
                            {{--</select>--}}
                          {{--</strong>--}}
                        {{--</h2>--}}
          {{----}}
                        {{--<div id="salesSelectorItems" class="chart-data-selector-items mt-sm">--}}
                          {{--<!-- Flot: Sales Porto Admin -->--}}
                          {{--<div class="chart chart-sm" data-sales-rel="Porto Admin" id="flotDashSales1" class="chart-active"></div>--}}
                          {{--<script>--}}
          {{----}}
                            {{--var flotDashSales1Data = [{--}}
                                {{--data: [--}}
                                    {{--["Jan", 140],--}}
                                    {{--["Feb", 240],--}}
                                    {{--["Mar", 190],--}}
                                    {{--["Apr", 140],--}}
                                    {{--["May", 180],--}}
                                    {{--["Jun", 320],--}}
                                    {{--["Jul", 270],--}}
                                    {{--["Aug", 180]--}}
                                {{--],--}}
                                {{--color: "#0088cc"--}}
                            {{--}];--}}
          {{----}}
                            {{--// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.--}}
          {{----}}
                          {{--</script>--}}
          {{----}}
                          {{--<!-- Flot: Sales Porto Drupal -->--}}
                          {{--<div class="chart chart-sm" data-sales-rel="Porto Drupal" id="flotDashSales2" class="chart-hidden"></div>--}}
                          {{--<script>--}}
          {{----}}
                            {{--var flotDashSales2Data = [{--}}
                                {{--data: [--}}
                                    {{--["Jan", 240],--}}
                                    {{--["Feb", 240],--}}
                                    {{--["Mar", 290],--}}
                                    {{--["Apr", 540],--}}
                                    {{--["May", 480],--}}
                                    {{--["Jun", 220],--}}
                                    {{--["Jul", 170],--}}
                                    {{--["Aug", 190]--}}
                                {{--],--}}
                                {{--color: "#2baab1"--}}
                            {{--}];--}}
          {{----}}
                            {{--// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.--}}
          {{----}}
                          {{--</script>--}}
          {{----}}
                          {{--<!-- Flot: Sales Porto Wordpress -->--}}
                          {{--<div class="chart chart-sm" data-sales-rel="Porto Wordpress" id="flotDashSales3" class="chart-hidden"></div>--}}
                          {{--<script>--}}
          {{----}}
                            {{--var flotDashSales3Data = [{--}}
                                {{--data: [--}}
                                    {{--["Jan", 840],--}}
                                    {{--["Feb", 740],--}}
                                    {{--["Mar", 690],--}}
                                    {{--["Apr", 940],--}}
                                    {{--["May", 1180],--}}
                                    {{--["Jun", 820],--}}
                                    {{--["Jul", 570],--}}
                                    {{--["Aug", 780]--}}
                                {{--],--}}
                                {{--color: "#734ba9"--}}
                            {{--}];--}}
          {{----}}
                            {{--// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.--}}
          {{----}}
                          {{--</script>--}}
                        {{--</div>--}}
          {{----}}
                      {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4 text-center">--}}
                      {{--<h2 class="panel-title mt-md">Sales Goal</h2>--}}
                      {{--<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">--}}
                        {{--<div class="liquid-meter">--}}
                          {{--<meter min="0" max="100" value="35" id="meterSales"></meter>--}}
                        {{--</div>--}}
                        {{--<div class="liquid-meter-selector" id="meterSalesSel">--}}
                          {{--<a href="#" data-val="35" class="active">Monthly Goal</a>--}}
                          {{--<a href="#" data-val="28">Annual Goal</a>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</section>--}}
            {{--</div>--}}
            {{--<div class="col-md-6 col-lg-12 col-xl-6">--}}
              {{--<div class="row">--}}
                {{--<div class="col-md-12 col-lg-6 col-xl-6">--}}
                  {{--<section class="panel panel-featured-left panel-featured-primary">--}}
                    {{--<div class="panel-body">--}}
                      {{--<div class="widget-summary">--}}
                        {{--<div class="widget-summary-col widget-summary-col-icon">--}}
                          {{--<div class="summary-icon bg-primary">--}}
                            {{--<i class="fa fa-life-ring"></i>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget-summary-col">--}}
                          {{--<div class="summary">--}}
                            {{--<h4 class="title">Support Questions</h4>--}}
                            {{--<div class="info">--}}
                              {{--<strong class="amount">1281</strong>--}}
                              {{--<span class="text-primary">(14 unread)</span>--}}
                            {{--</div>--}}
                          {{--</div>--}}
                          {{--<div class="summary-footer">--}}
                            {{--<a class="text-muted text-uppercase">(view all)</a>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</section>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 col-lg-6 col-xl-6">--}}
                  {{--<section class="panel panel-featured-left panel-featured-secondary">--}}
                    {{--<div class="panel-body">--}}
                      {{--<div class="widget-summary">--}}
                        {{--<div class="widget-summary-col widget-summary-col-icon">--}}
                          {{--<div class="summary-icon bg-secondary">--}}
                            {{--<i class="fa fa-usd"></i>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget-summary-col">--}}
                          {{--<div class="summary">--}}
                            {{--<h4 class="title">Total Profit</h4>--}}
                            {{--<div class="info">--}}
                              {{--<strong class="amount">$ 14,890.30</strong>--}}
                            {{--</div>--}}
                          {{--</div>--}}
                          {{--<div class="summary-footer">--}}
                            {{--<a class="text-muted text-uppercase">(withdraw)</a>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</section>--}}
                {{--</div>--}}
              {{--</div>--}}
              {{--<div class="row">--}}
                {{--<div class="col-md-12 col-lg-6 col-xl-6">--}}
                  {{--<section class="panel panel-featured-left panel-featured-tertiary">--}}
                    {{--<div class="panel-body">--}}
                      {{--<div class="widget-summary">--}}
                        {{--<div class="widget-summary-col widget-summary-col-icon">--}}
                          {{--<div class="summary-icon bg-tertiary">--}}
                            {{--<i class="fa fa-shopping-cart"></i>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget-summary-col">--}}
                          {{--<div class="summary">--}}
                            {{--<h4 class="title">Today's Orders</h4>--}}
                            {{--<div class="info">--}}
                              {{--<strong class="amount">38</strong>--}}
                            {{--</div>--}}
                          {{--</div>--}}
                          {{--<div class="summary-footer">--}}
                            {{--<a class="text-muted text-uppercase">(statement)</a>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</section>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 col-lg-6 col-xl-6">--}}
                  {{--<section class="panel panel-featured-left panel-featured-quaternary">--}}
                    {{--<div class="panel-body">--}}
                      {{--<div class="widget-summary">--}}
                        {{--<div class="widget-summary-col widget-summary-col-icon">--}}
                          {{--<div class="summary-icon bg-quaternary">--}}
                            {{--<i class="fa fa-user"></i>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget-summary-col">--}}
                          {{--<div class="summary">--}}
                            {{--<h4 class="title">Today's Visitors</h4>--}}
                            {{--<div class="info">--}}
                              {{--<strong class="amount">3765</strong>--}}
                            {{--</div>--}}
                          {{--</div>--}}
                          {{--<div class="summary-footer">--}}
                            {{--<a class="text-muted text-uppercase">(report)</a>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</section>--}}
                {{--</div>--}}
              {{--</div>--}}
            {{--</div>--}}
          {{--</div>--}}

          <!-- end: page -->
        </section>
      </div>

      <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
          <div class="nano-content">
            <a href="#" class="mobile-close visible-xs">
              Collapse <i class="fa fa-chevron-right"></i>
            </a>
      
            <div class="sidebar-right-wrapper">
      
              <div class="sidebar-widget widget-calendar">
                <h6>Upcoming Tasks</h6>
                <div data-plugin-datepicker data-plugin-skin="dark" ></div>
      
                <ul>
                  <li>
                    <time datetime="2016-04-19T00:00+00:00">04/19/2016</time>
                    <span>Company Meeting</span>
                  </li>
                </ul>
              </div>
      
              <div class="sidebar-widget widget-friends">
                <h6>Friends</h6>
                <ul>
                  <li class="status-online">
                    <figure class="profile-picture">
                      <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
                    </figure>
                    <div class="profile-info">
                      <span class="name">Joseph Doe Junior</span>
                      <span class="title">Hey, how are you?</span>
                    </div>
                  </li>
                  <li class="status-online">
                    <figure class="profile-picture">
                      <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
                    </figure>
                    <div class="profile-info">
                      <span class="name">Joseph Doe Junior</span>
                      <span class="title">Hey, how are you?</span>
                    </div>
                  </li>
                  <li class="status-offline">
                    <figure class="profile-picture">
                      <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
                    </figure>
                    <div class="profile-info">
                      <span class="name">Joseph Doe Junior</span>
                      <span class="title">Hey, how are you?</span>
                    </div>
                  </li>
                  <li class="status-offline">
                    <figure class="profile-picture">
                      <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
                    </figure>
                    <div class="profile-info">
                      <span class="name">Joseph Doe Junior</span>
                      <span class="title">Hey, how are you?</span>
                    </div>
                  </li>
                </ul>
              </div>
      
            </div>
          </div>
        </div>
      </aside>

    </section>

@stop