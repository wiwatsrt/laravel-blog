<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- Inner sidebar -->
    <section class="sidebar">
        <!-- user panel (Optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/adminLTE/img/default-avatar.png') }}" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div><!-- /.user-panel -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Navigation</li>
            @section('sidebar')
            <li class="{{ (Request::is('admin/dashboard*') ? 'active' : '') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ trans('l5starter::general.dashboard') }}</span>
                </a>
            </li>
            <li class="treeview{{ (Request::is('admin/post*') ? ' active' : '') }}">
                <a href="#">
                    <i class="fa fa-file"></i> <span>{{ trans('messages.post') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (Request::is('admin/posts') ? 'active' : '') }}">
                        <a href="{{ route('admin.posts.index') }}">
                            <i class="fa fa-circle-o"></i> <span>{{ trans('messages.all_posts') }}</span>
                        </a>
                    </li>
                    <li class="{{ (Request::is('admin/posts/create') ? 'active' : '') }}">
                        <a href="{{ route('admin.posts.create') }}">
                            <i class="fa fa-circle-o"></i> <span>{{ trans('messages.add_new_post') }}</span>
                        </a>
                    </li>
                    <li class="{{ (Request::is('admin/post/categories*') ? 'active' : '') }}">
                        <a href="{{ route('admin.post.categories.index') }}">
                            <i class="fa fa-circle-o"></i> <span>{{ trans('messages.category') }}</span>
                        </a>
                    </li>
                    <li class="{{ (Request::is('admin/post/tags*') ? 'active' : '') }}">
                        <a href="{{ route('admin.post.tags.index') }}">
                            <i class="fa fa-circle-o"></i> <span>{{ trans('messages.tag') }}</span>
                        </a>
                    </li>
                    <li class="{{ (Request::is('admin/post/statuses*') ? 'active' : '') }}">
                        <a href="{{ route('admin.post.statuses.index') }}">
                            <i class="fa fa-circle-o"></i> <span>{{ trans('messages.status') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ (Request::is('admin/users*') ? 'active' : '') }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user"></i> <span>{{ trans('l5starter::general.users') }}</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/roles*') ? 'active' : '') }}">
                <a href="{{ route('admin.roles.index') }}">
                    <i class="fa fa-users"></i> <span>{{ trans('l5starter::general.roles') }}</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/permissions*') ? 'active' : '') }}">
                <a href="{{ route('admin.permissions.index') }}">
                    <i class="fa fa-circle-o"></i> <span>{{ trans('l5starter::general.permissions') }}</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/settings*') ? 'active' : '') }}">
                <a href="{{ route('admin.settings.index') }}">
                    <i class="fa fa-cogs"></i> <span>{{ trans('l5starter::general.settings') }}</span>
                </a>
            </li>
            @show
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside><!-- /.main-sidebar -->