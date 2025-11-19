<aside class="sidebar-wrapper" data-simplebar="true">
   <div class="sidebar-header">
      <div>
         <img src="{{asset('assets/images/logo.jpg')}}" class="logo-icon" alt="logo icon">
      </div>
      <div>
         <h4 class="logo-text">COMPLAINT</h4>
      </div>
      <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
      </div>
   </div>
   <!--navigation-->
   <ul class="metismenu" id="menu">
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-grid"></i>
            </div>
            <div class="menu-title"> User Management/System Setting</div>
         </a>
         <ul>
            @can(['User-list'])
            <li>
               <a href="{{route('user.index')}}"><i class="bi bi-arrow-right-short"></i>User Information</a>
            </li>
            @endcan
            @canany(['role-list','role-permission'])
            <li class="@if (Route::is('user-management.*')) mm-active @endif">
               <a href="{{route('user-management.role-index')}}"><i class="bi bi-arrow-right-short"></i>Role Permission Assign</a>
            </li>
            @endcanany
         </ul>
      </li>
      
   </ul>
   <!--end navigation-->
</aside>