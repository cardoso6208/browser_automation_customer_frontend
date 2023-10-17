<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{asset('/img/logo.png')}}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div>
                </a>
            </div>
        </div>
        <div id="adminmenu">
            @if(Auth::user()->id == 0)
                <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
            @elseif(Auth::user()->role_id == 1)
                <admin-menu :items="{{ menu('menu-1', '_json') }}"></admin-menu>
            @elseif(Auth::user()->role_id == 3)
                <admin-menu :items="{{ menu('menu-2', '_json') }}"></admin-menu>
            @endif
        </div>
    </nav>
</div>
