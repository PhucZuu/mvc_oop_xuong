<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        {{-- <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
            <ul>
                <li><a class="active" href="index-2.html">Sales</a></li>
                <li><a href="index_2.html">Default</a></li>
                <li><a href="index_3.html">Dark Menu</a></li>
            </ul>
        </li> --}}

        <li class>
            <a href="{{ url('admin/') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/2.svg') }}" alt>
                </div>
                <span>Danh mục</span>
            </a>
            <ul>
                <li><a class="active" href="{{ url('admin/categories/') }}">Danh sách</a></li>
                <li><a href="{{ url('admin/categories/create') }}">Thêm</a></li>
                <li><a href="{{ url('admin/categories/listDeleted') }}">Đã xóa</a></li>
            </ul>
        </li>

        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/4.svg') }}" alt>
                </div>
                <span>Tin tức</span>
            </a>
            <ul>
                <li><a class="active" href="{{ url('admin/news/') }}">Danh sách</a></li>
                <li><a href="{{ url('admin/news/create') }}">Thêm</a></li>
            </ul>
        </li>

        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/user.svg') }}" alt>
                </div>
                <span>Người dùng</span>
            </a>
            <ul>
                <li><a class="active" href="{{ url('admin/users/') }}">Danh sách</a></li>
                <li><a href="{{ url('admin/users/listBanned') }}">Tài khoản khóa</a></li>
            </ul>
        </li>

        <li class>
            <a href="{{ url() }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/12.svg') }}" alt>
                </div>
                <span>Thoát</span>
            </a>
        </li>
    </ul>
</nav>
