<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('sidebar-1.jpg')}}">
      <div class="logo">
        <a href="http://www.google.com" class="simple-text logo-normal">
          SIFU IT
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{Request::is('admin/backend') ? 'active':''}}">
            <a class="nav-link" href="{{route('admin.backend')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/slider') ? 'active':''}}">
            <a class="nav-link" href="{{route('slider.index')}}">
              <i class="material-icons">
              slideshow
              </i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/category') ? 'active':''}}">
            <a class="nav-link" href="{{route('category.index')}}">
              <i class="material-icons">content_paste</i>
              <p>ADD Category</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('admin/item') ? 'active':''}}">
            <a class="nav-link" href="{{route('item.index')}}">
              <i class="material-icons">library_books</i>
              <p>Item</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/reservation') ? 'active':''}}">
            <a class="nav-link" href="{{route('reservation.index')}}">
              <i class="material-icons">bubble_chart</i>
              <p>Reservation</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/acontect') ? 'active':''}}">
            <a class="nav-link" href="{{route('acontect.index')}}">
              <i class="material-icons">location_ons</i>
              <p>Contect</p>
            </a>
          </li>
        </ul>
      </div>
    </div>