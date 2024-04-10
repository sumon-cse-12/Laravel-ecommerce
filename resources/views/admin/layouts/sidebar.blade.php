<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
       Dashboard
          <span class="right badge badge-info">New</span>
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.category.index')}}" class="nav-link">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>
         Category
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.product.index')}}" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
         Products
        </p>
      </a>
    </li>   
    <li class="nav-item">
      <a href="{{route('admin.blog-category.index')}}" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
        Blog Category
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.blog.index')}}" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
        Blogs
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.about.index')}}" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
        About us
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.page.index')}}" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
       Pages
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.order.index')}}" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
       Orders
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.settings.index')}}" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
        App Settings
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview {{isSidebarTrue(['admin.faq.*','admin.template'])? 'menu-open' : ''}}">
      <a href="#" class="nav-link {{isSidebarTrue(['admin.faq.*', 'admin.template'])? 'active nav-link-active' : ''}}">
          <i class="nav-icon fas fa-cogs n-danger-c"></i>
          <p>
              Site Settings
              <i class="right fas fa-angle-left"></i>
          </p>
      </a>
      <ul class="nav nav-treeview"
          style="display: {{isSidebarTrue(['admin.faq*','admin.template'])? 'block': 'none'}};">


          <li class="nav-item">
              <a href="{{route('admin.template')}}" class="nav-link {{isSidebarActive('admin.template')}}">
                  <i class="nav-icon fa fa-angle-double-right"></i>
                  <p>
                      {{trans('Template')}}
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.faq.index')}}" class="nav-link {{isSidebarActive('admin.faq*')}}">
                  <i class="nav-icon fa fa-angle-double-right"></i>
                  <p>
                      {{trans('FAQ')}}
                  </p>
              </a>
          </li>
      </ul>
  </li>
  </ul>