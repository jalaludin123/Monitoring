 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="index.html" class="logo d-flex align-items-center">
             <img src="{{ asset('image/logo/' . $appSetting->logo) }}" alt="">
             <span class="d-none d-lg-block">{{ $appSetting->name_website }}</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->


     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">

             <li class="nav-item dropdown pe-3">

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                     data-bs-toggle="dropdown">
                     @if (!Auth::user()->userDetail)
                         <img src="{{ asset('image/profile/1-min.png') }}" alt="Profile" class="rounded-circle">
                     @else
                         <img src="{{ asset('image/profile/' . auth()->user()->userDetail->foto) }}" alt="Profile"
                             class="rounded-circle">
                     @endif
                     <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         <h6>{{ Auth::user()->name }}</h6>
                         <span>
                             @if (Auth::user()->role == 0)
                                 Kepala Dinas
                             @elseif (Auth::user()->role == 1)
                                 Admin
                             @else
                                 Staf
                             @endif
                         </span>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="{{ url('perindag/profile') }}">
                             <i class="bi bi-person"></i>
                             <span>My Profile</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     @if (Auth::user()->role == 1)
                         <li>
                             <a class="dropdown-item d-flex align-items-center" href="{{ url('perindag/setting') }}">
                                 <i class="bi bi-gear"></i>
                                 <span>Settings</span>
                             </a>
                         </li>
                     @endif
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                             <i class="bi bi-box-arrow-right"></i>
                             <span>Sign Out</span>
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </li>

                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->
