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
                                    <i class="fa fa-columns" aria-hidden="true"></i>
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
                        </ul>
                    </nav>
