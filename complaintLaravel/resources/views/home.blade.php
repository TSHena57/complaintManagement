{{-- @extends('layouts.admin_app')

@section('content')
<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
    <div class="col">
        <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-4 fs-2 text-primary">
                <i class="bi bi-person"></i>
            </div>
            <div class="col-3">
                <p class="mb-1">Local-CP</p>
                <h4 class="mb-0 text-primary">430</h4>
            </div>
                <div class="m-4 fs-2 text-primary ">
                <i class="bi bi-person"></i>
            </div>
            <div class="col-4">
                <p class="mb-1">Foreign-CP</p>
                <h4 class="mb-0 text-primary">70</h4>
            </div>
            </div>
            <!-- <div class="border-top my-2"></div>
            <small class="mb-0"><span class="text-success">+2.5 <i class="bi bi-arrow-up"></i></span> Compared to last
            month</small> -->
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
        <div class="card-body">

            <div class="d-flex align-items-center">
            <div class="m-4 fs-2 text-success">
                <i class="bi bi-people-fill "></i>
            </div>
            <div class="col-4">
                <p class="mb-1">Group </p>
                <h4 class="mb-0 text-success">65 </h4>
            </div>
            <div class="m-4 fs-2 text-success">
                <i class="bi bi-calendar2-event "></i>
            </div>
            <div class="col-3">
                <p class="mb-1">Event</p>
                <h4 class="mb-0 text-success">13 </i></h4>
            </div>

            </div>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
        <div class="card-body ">
            <div class="d-flex align-items-center">
            <div class="m-4 fs-2 text-pink">
                <i class="bi bi-folder2-open"></i>
            </div>
            <div class="">
                <p class="mb-1">Pending Assessment</p>
                <h4 class="mb-0 text-pink">10</h4>
            </div>
            <!-- <div class="ms-auto fs-2 text-pink">
                <i class="bi bi-bag-check"></i>
            </div> -->
            </div>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
            <div class="text-success m-4 fs-2">
                <i class="bi bi-file-earmark-break  text-orange"></i>
            </div>
            <div class="">
                <p class="mb-1">Submitied Assessment</p>
                <h4 class="mb-0 text-orange">146</h4>
            </div>
            <div class="ms-auto fs-2 text-orange">
                <i class="bi folder-minus"></i>
            </div>
            </div>

        </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8 col-xl-8">
        <div class="card radius-10">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">Student Assessment</h5>
            </div>
            </div>
            <div id="chart1"></div>
        </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xl-4">

        <div class="card radius-10 ">
        <div class="card-body ">
            <div class="col">
            <h5 class="mb-4">Group Status</h5>
            </div>
            <div class="d-flex align-items-center gap-4 ">
            <div class="">
                <span class="donut"
                data-peity='{ "fill": ["#8932ff", "rgba(135, 50, 255, 0.15)"], "innerRadius": 28, "radius": 50, "width": 67, "height": 140}'>3/5</span>
            </div>
            <div class="">
                <h4 class="mb-0">64%</h4>
                <p class="mb-1">Best Group</p>
            </div>
            <div class="dropdown ms-auto">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                    class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:;">Action</a>
                </li>
                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                </li>
                </ul>
            </div>
            </div>
            <div class="border-top my-4"></div>
            <div class="d-flex align-items-center gap-4">
            <div class="">
                <span class="donut"
                data-peity='{ "fill": ["#ff6632", "rgba(255, 101, 50, 0.15)"], "innerRadius": 28, "radius": 50, "width": 67, "height": 140}'>3.5/5</span>
            </div>
            <div class="">
                <h4 class="mb-0">36%</h4>
                <p class="mb-1">Lowest Group</p>
            </div>
            <div class="dropdown ms-auto">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                    class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:;">Action</a>
                </li>
                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection --}}
@php 
    $role_id = Auth::user()->role->id;
@endphp

@extends('layouts.admin_app')

@section('content')

@php if($role_id==''){@endphp @include('mututalassesment::dashboard_admin') @php }@endphp
@php if($role_id==6){@endphp @include('mututalassesment::dashboard_cp') @php }@endphp
@php if($role_id==4||$role_id==5){@endphp @include('mututalassesment::dashboard_ds') @php }@endphp

@endsection

