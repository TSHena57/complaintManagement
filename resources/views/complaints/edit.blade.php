@extends('layouts.admin_app')
@section('title')
    Edit Complaints
@endsection
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Complaints</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Complaints</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-4" method="POST" action="{{ route('complaint.update', $complaint->id) }}">
                            @csrf
                            <div class="col-xl-4">
                                <label class="form-label" for="title">Complaint Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $complaint->title }}" required>
                            </div>

                            <div class="col-xl-8">
                                <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $complaint->address }}" required>
                            </div>

                            <div class="col-xl-12">
                                <label class="form-label" for="description">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="6" required>{{ $complaint->description }}</textarea>
                            </div>

                            <div class="submit text-end">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
