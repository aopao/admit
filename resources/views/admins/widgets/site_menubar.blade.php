<div class="site-menubar">
    <ul class="site-menu">
        <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">学生管理</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item">
                    <a class="animsition-link" href="{{ route('admin.student.index') }}">
                        <span class="site-menu-title">学生列表</span>
                    </a>
                </li>
                <li class="site-menu-item">
                    <a class="animsition-link" href="{{ route('admin.student.create') }}">
                        <span class="site-menu-title">添加学生</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="site-menu-item has-sub active open">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">大学管理</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item active">
                    <a class="animsition-link" href="{{ route('admin.college.index') }}">
                        <span class="site-menu-title">大学列表</span>
                    </a>
                </li>
            </ul>
        </li>
        {{--<li class="site-menu-item has-sub">--}}
            {{--<a href="javascript:void(0)">--}}
                {{--<i class="site-menu-icon wb-file" aria-hidden="true"></i>--}}
                {{--<span class="site-menu-title">Pages</span>--}}
                {{--<span class="site-menu-arrow"></span>--}}
            {{--</a>--}}
            {{--<ul class="site-menu-sub">--}}
                {{--<li class="site-menu-item has-sub">--}}
                    {{--<a href="javascript:void(0)">--}}
                        {{--<span class="site-menu-title">Errors</span>--}}
                        {{--<span class="site-menu-arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="site-menu-sub">--}}
                        {{--<li class="site-menu-item">--}}
                            {{--<a class="animsition-link" href="../pages/error-400.html">--}}
                                {{--<span class="site-menu-title">400 Bad Request</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="site-menu-item">--}}
                            {{--<a class="animsition-link" href="../pages/error-403.html">--}}
                                {{--<span class="site-menu-title">403 Forbidden</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="site-menu-item">--}}
                            {{--<a class="animsition-link" href="../pages/error-404.html">--}}
                                {{--<span class="site-menu-title">404 Not Found</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="site-menu-item">--}}
                            {{--<a class="animsition-link" href="../pages/error-500.html">--}}
                                {{--<span class="site-menu-title">500 Internal Server Error</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="site-menu-item">--}}
                            {{--<a class="animsition-link" href="../pages/error-503.html">--}}
                                {{--<span class="site-menu-title">503 Service Unavailable</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    </ul>
</div>
