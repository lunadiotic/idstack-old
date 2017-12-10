<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="{{ route('admin') }}" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i><span> Courses </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.subject.index') }}">Subjects</a></li>
                        <li><a href="{{ route('admin.software.index') }}">Software</a></li>
                        <li><a href="{{ route('admin.level.index') }}">Level</a></li>
                        <li><a href="{{ route('admin.course.index') }}">Courses</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="{{ route('admin.user.index') }}" class="waves-effect"><i class="ti-user"></i><span> Users </span> </a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>