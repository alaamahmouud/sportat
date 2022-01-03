
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                    {{--// profile image and display name of user--}}

                    <span>
                            <img alt="image"  style="max-width: 183px;"
                                 src="{{asset('photos/cartoon.png')}}"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{Auth::user()->name}}</strong>
                                    {{--@foreach(auth()->user()->roles as $role)--}}
                                    {{--<span class="label label-success">{{$role->display_name}}</span>--}}
                                    {{--@endforeach--}}
                                </span>
                            </span>
                    </a>


                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        {{--<!-- <li><a href="">حسابي</a></li>--}}
                        {{--<li class="divider"></li> -->--}}

                        <li>

                            <a href="{{url('admin/reset-password')}}" > <i class="fa fa-key" style="margin-left: 5px;"></i> تسجيل الخروج  </a>

                        </li>
                        <li>
                            <script type="">
                                function submitSidebarSignout() {
                                    document.getElementById('signoutSidebar').submit();

                                }
                            </script>
                            {!! Form::open(['method' => 'post', 'url' => url('logout'),'id'=>'signoutForm','id'=>'signoutSidebar']) !!}
                            {!! Form::hidden('guard','admin') !!}

                            {!! Form::close() !!}
                            <a href="#" onclick="submitSidebarSignout()"> <i class="fa fa-sign-out" style="margin-left: 5px;"></i> تسجيل الخروج  </a>

                        </li>
                    </ul>
                </div>

                <div class="logo-element">

                    <img src="{{asset('photos/logo_title.png')}}" style="margin-top: 20px; margin-bottom:auto;" height="20"
                         alt="logo">
                </div>
            </li>
            {{--Home--}}
            <li>
                <a href="{{url('admin/home')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">الرئيسية</span>
                </a>
            </li>
            
            <!-- <li>
                <a href="{{url('admin/advertisements')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">العروض</span>
                </a>
            </li> -->


{{--            <li>--}}
{{--                <a href="{{url('admin/categories')}}">--}}
{{--                    <i class="fa fa-home"></i>--}}
{{--                    <span class="nav-label">الاقسام</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <!-- <li>
                <a href="{{url('admin/services')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label"> الخدمات</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="{{url('admin/details')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label"> تفاصيل الخدمات</span>
                </a>
            </li> -->


            <!-- <li>
                <a href="{{url('admin/clients')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">العملاء</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="{{url('admin/about-us')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">من نحن</span>
                </a>
            </li> -->
            
            <!-- <li>
                <a href="{{url('admin/certificates')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">شهاده الضمان</span>
                </a>
            </li> -->


            <!-- <li>
                <a href="{{url('admin/notifications')}}">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="nav-label">الإشعارات</span>
                </a>
            </li> -->







        </ul>
    </div>
</nav>
