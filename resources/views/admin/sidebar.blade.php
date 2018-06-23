<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li>
            <a href="{{ url('admin') }}">
                <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
            </a>
        </li>
        <?php 
        $check = Request::is('admin/users*')
            || Request::is('admin/roles*')
            || Request::is('admin/permissions*');

        $active = '';
        if ($check) {
            $active = 'active';
        }
        ?>
        <li class="treeview {{$active}}">
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Quản trị hệ thống</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li role="presentation">
                    <a href="{{ url('admin/users') }}">
                        <span>Thành viên</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/roles') }}">
                        <span>Vai trò</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/permissions') }}">
                        <span>Quyền hạn</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php 
        $check = Request::is('admin/bookmark*')
            || Request::is('admin/frame*')
            || Request::is('admin/pillow*')
            || Request::is('admin/neck*')
            || Request::is('admin/clock*');

        $active = '';
        if ($check) {
            $active = 'active';
        }
        ?>
        <li class="treeview {{$active}}">
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Quản lí sản phẩm</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li role="presentation">
                    <a href="{{ url('admin/users') }}">
                        <span>Thiệp xinh</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/roles') }}">
                        <span>Sổ tay</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/bookmark') }}">
                        <span>Bookmark đẹp</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/neck') }}">
                        <span>Vòng tay</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/frame') }}">
                        <span>Khung ảnh</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/clock') }}">
                        <span>Đông hồ</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/pillow') }}">
                        <span>Gối đẹp</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('admin/permissions') }}">
                        <span>Sản phẩm khác</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</section>