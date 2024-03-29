
            <div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Bienvenu,</span>
    <h2>{{ Auth::user()->name }}</h2>
  </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
    <li><a><i class="fa fa-home"></i>{{ __('admin/sidebar.categories') }} <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.categories')}}"> {{ __('admin/sidebar.all categories') }}</a></li>
                      <li><a href="{{route('admin.categories.create')}}"> {{ __('admin/sidebar.add new category') }}</a></li>

                    </ul>
                  </li>


    </ul>

      <ul class="nav side-menu">
        <li>
          <a><i class="fa fa-home"></i>{{ __('admin/sidebar.cities') }} <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                    <li><a href="{{ route('admin.cities') }}">{{ __('admin/sidebar.all cities') }}</a></li>
                    <li><a href="{{ route('admin.cities.create') }}">{{ __('admin/sidebar.add new city') }}</a></li>

                </ul>
        </li>
      </ul>


      <ul class="nav side-menu">
        <li>
          <a><i class="fa fa-user"></i>{{ __('admin/sidebar.users') }}<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                    <li><a href="{{ route('admin.users') }}">{{ __('admin/sidebar.all users') }}</a></li>
                    <li><a href="{{ route('admin.users.create') }}">{{ __('admin/sidebar.add new user') }}</a></li>

                </ul>
        </li>
      </ul>


      <ul class="nav side-menu">
        <li>
          <a><i class="fa fa-home"></i>{{ __('admin/sidebar.properties') }}<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                    <li><a href="{{ route('admin.properties.index') }}">{{ __('admin/sidebar.all properties') }}</a></li>
                    <li><a href="{{ route('admin.properties.general.create') }}">{{ __('admin/sidebar.add new property') }}</a></li>
                </ul>
        </li>
      </ul>


      <ul class="nav side-menu">
        <li>
          <a><i class="fa fa-user"></i>{{ __('admin/sidebar.sliders') }}<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">

                    <li><a href="{{ route('create.slider') }}">{{ __('admin/sidebar.create new slider') }}</a></li>

                </ul>
        </li>
      </ul>




  </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
