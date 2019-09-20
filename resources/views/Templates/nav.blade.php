<nav id="menu" class="nav-main" role="navigation">
                    
                        <ul class="nav nav-main">
                            {{--<li>--}}
                                {{--<a href="{{url('/welcome')}}">--}}
                                    {{--<i class="fa fa-home" aria-hidden="true"></i>--}}
                                    {{--<span>Dashboard</span>--}}
                                {{--</a>                        --}}
                            {{--</li>--}}


                            <li class="nav-parent nav-expanded">
                                <a href="#">
                                    <i class="fa fa-bitbucket" aria-hidden="true"></i>
                                    <span>Station</span>
                                </a>

                                <ul class="nav nav-children">
                                    <li>
                                        <a href="{{url('/CreateStation')}}">
                                            Create Station
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('/StationList')}}">
                                            Station List
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-parent nav-expanded">
                                <a href="#">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Company</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="{{url('/CreateCompany')}}">
                                            Add Company
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/CompanyList')}}">
                                            Company List
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-parent nav-expanded">
                                <a href="#">
                                    <i class="fa fa-google-wallet" aria-hidden="true"></i>
                                    <span>Chemical</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="{{url('/CreateChemical')}}">
                                            Add Chemical
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/ChemicalList')}}">
                                            Chemical List
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('/CreateDilution')}}">
                                            Add Dilution
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/DilutionList')}}">
                                            Dilution List
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-parent nav-expanded">
                                <a href="#">
                                    <i class="fa fa-ravelry" aria-hidden="true"></i>
                                    <span>Reports</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="{{url('/ActivityReport')}}">
                                            Activity Report
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('/TrendReport')}}">
                                            Trend Report
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('/PieChartReport')}}">
                                            Pie Chart Report
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('/ObservationReport')}}">
                                            Observation Report
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('/CorrectiveActionReport')}}">
                                            Corrective Action Report
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('/APPInput')}}">
                                            APP Input
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
