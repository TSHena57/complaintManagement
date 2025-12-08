<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">COMPLAINT</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @canany(['User-list', 'role-list', 'role-permission'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-grid"></i>
                    </div>
                    <div class="menu-title"> User Management/System Setting</div>
                </a>
                <ul>
                    @can(['User-list'])
                        <li>
                            <a href="{{ route('user.index') }}"><i class="bi bi-arrow-right-short"></i>User Information</a>
                        </li>
                    @endcan
                    @canany(['role-list', 'role-permission'])
                        <li class="@if (Route::is('user-management.*')) mm-active @endif">
                            <a href="{{ route('user-management.role-index') }}"><i class="bi bi-arrow-right-short"></i>Role
                                Permission Assign</a>
                        </li>
                    @endcanany
                </ul>
            </li>
        @endcanany
        @if (auth()->user()->role_id != 3)
            @php
                $notifyAdmin = \App\Models\Complaint::where('notify_admin', 1)->count();
            @endphp
            <li>
                <a href="{{ route('complaint.index') }}">
                    <div class="parent-icon"><i class="bi bi-grid"></i>
                    </div>
                    <div class="menu-title"> All Complaints
                        @if ($notifyAdmin > 0)
                            <span class="badge bg-danger" style="margin-left: 5px">{{ $notifyAdmin }}</span>
                        @endif
                    </div>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('complaint.create') }}">
                <div class="parent-icon"><i class="bi bi-grid"></i>
                </div>
                <div class="menu-title"> Add Complaints</div>
            </a>
        </li>
        @php
            $notifyUser = \App\Models\Complaint::where('notify_user', 1)->count();
        @endphp
        <li>
            <a href="{{ route('complaint.my-index') }}">
                <div class="parent-icon"><i class="bi bi-grid"></i>
                </div>
                <div class="menu-title"> My Complaints
                    @if ($notifyUser > 0)
                        <span class="badge bg-danger" style="margin-left: 5px">{{ $notifyUser }}</span>
                    @endif
                </div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</aside>
