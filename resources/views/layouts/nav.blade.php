 <!-- { navigation menu } start -->
 <aside class="app-sidebar app-light-sidebar" style="background-color: ">
   <div class="app-navbar-wrapper">
     <div class="brand-link brand-logo">
       <a href="#" class="b-brand">
        @if(!empty($setting->logo) && file_exists(public_path('storage/' . $setting->logo)))
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="" class="logo logo-lg" style="background-color: {{ $setting->logo_color }};">
        @else
            <img src="{{ asset('https://raw.githubusercontent.com/abisanthm/abisanthm.github.io/main2/1.png') }}" alt="Default Image" class="logo logo-lg" style="background-color: {{ $setting->logo_color }};">
        @endif
       </a>
     </div>
     <div class="navbar-content">
       <ul class="app-navbar">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link"><span class="nav-icon"><i class="ti ti-layout-2"></i></span><span class="nav-text">Dashboard</span></a>
        </li>
        <li class="nav-item {{ Request::is('students/*')  ? 'active' : '' }}">
            <a href="/students" class="nav-link "><span class="nav-icon"><i class="ti ti-layout-2"></i></span><span class="nav-text">Students</span></a>
        </li>
        <li class="nav-item {{ Request::is('programs/*')  ? 'active' : '' }}">
            <a href="/programs" class="nav-link "><span class="nav-icon"><i class="ti ti-layout-2"></i></span><span class="nav-text">Courses</span></a>
        </li>
        <li class="nav-item nav-hasmenu {{ Request::is('roles/*') || Request::is('users/*')  ? 'active nav-provoke' : '' }}">
           <a href="#!" class="nav-link {{ Request::is('roles') || Request::is('users')  ? 'active' : '' }}">
             <span class="nav-icon">
               <i class="ti ti-layout-2"></i>
             </span>
             <span class="nav-text">Users</span>
             <span class="nav-arrow">
               <i data-feather="chevron-right"></i>
             </span>
           </a>
           <ul class="nav-submenu">
             @canany(['create-user', 'edit-user', 'delete-user'])
             <li class="nav-item {{ Request::is('users/*')  ? 'active nav-provoke' : '' }}">
               <a class="nav-link " href="{{ url('users') }}">Users</a>
             </li>
             @endcanany
             @canany(['create-role', 'edit-role', 'delete-role'])
             <li class="nav-item {{ Request::is('roles/*')  ? 'active nav-provoke' : '' }}">
               <a class="nav-link" href="{{ url('roles') }}">Roles</a>
             </li>
             @endcanany
           </ul>
         </li>
         <li class="nav-item nav-hasmenu {{   Request::is('values/*')  ? 'active nav-provoke' : '' }}">
           <a href="#!" class="nav-link">
             <span class="nav-icon">
               <i class="ti ti-layout-2"></i>
             </span>
             <span class="nav-text">Settings</span>
             <span class="nav-arrow">
               <i data-feather="chevron-right"></i>
             </span>
           </a>
           <ul class="nav-submenu">
              @canany(['create-setting', 'edit-setting', 'delete-setting'])
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/settings') }}">Genarel Settings</a>
                </li>
              @endcanany
              @canany(['edit-certificate-setting'])
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('settings/verification-config') }}">Verification Settings</a>
              </li>
              @endcanany
              @canany(['edit-mail'])
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('settings/mail-config') }}">Mail Settings</a>
              </li>
              @endcanany
              {{-- @canany(['edit-value'])
                <li class="nav-item {{   Request::is('values/*')  ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/values') }}">Custom Values</a>
                </li>
              @endcanany --}}
           </ul>
         </li>
         <li class="nav-item {{ Request::is('user-logs/*')  ? 'active' : '' }}">
          <a href="/user-logs" class="nav-link "><span class="nav-icon"><i class="ti ti-layout-2"></i></span><span class="nav-text">Logs</span></a>
          </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
             <span class="nav-icon">
               <i class="ti ti-layout-2"></i>
             </span>
             <span class="nav-text">Logout</span>
             <span class="nav-arrow">
               </i>
             </span>
           </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
         </li>
       </ul>
     </div>
   </div>
 </aside>
 <!-- { navigation menu } end -->
