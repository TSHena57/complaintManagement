@extends('layouts.admin_app')
@section('title')
    Complaint Details
@endsection
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Complaints</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Complaint Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-4" method="POST" action="{{ route('complaint.reply', $complaint->id) }}">
                            @csrf
                            <div class="col-xl-12">
                                <label class="form-label">Status <span class="text-danger">*<span></label>
                                <select class="form-select single-select" id="status" name="status" required>
                                    <option value="pending">-- Pending --</option>
                                    <option value="processing">-- Processing --</option>
                                    <option value="invalid">-- Invalid --</option>
                                    <option value="action_taken">-- Action Taken --</option>
                                    <option value="solved">-- Solved --</option>
                                </select>
                            </div>

                            <div class="col-xl-12">
                                <label class="form-label" for="remarks">Reply <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="6" required></textarea>
                            </div>

                            <div class="submit text-end">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card bg-info-subtle radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mt-0">Query: {{$complaint->title}}</h5>
                                    <p class="mb-0 px-5">{{$complaint->description}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                            @forelse ($complaint->complaint_details as $reply)
                            <div class="card-body bg-info-subtle">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mt-0">{{$reply->user->name}}</h5>
                                        <p class="mb-0 px-4">{{$reply->remarks}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @empty
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mt-0 text-center">No Reply yet!</h5>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
