@extends('layouts.front')

@section('content')
    <!-- Page Header -->
    <section class="py-5 text-center text-white" style="background: linear-gradient(90deg, #003973, #1e5799, #2989d8);">
        <div class="container">
            <h1 class="fw-bold mb-2">Complaints Overview</h1>
            <p class="lead opacity-75">Track and manage submitted complaints efficiently</p>
        </div>
    </section>

    <!-- Counter Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3 col-6">
                    <div class="counter-box p-4 shadow-sm">
                        <i class="bi bi-clipboard-data text-primary fs-2 mb-2"></i>
                        <h2>{{ $complaints }}</h2>
                        <p>Total Complaints</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box p-4 shadow-sm">
                        <i class="bi bi-hourglass-split text-warning fs-2 mb-2"></i>
                        <h2>{{ $complaint_pending }}</h2>
                        <p>Pending</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box p-4 shadow-sm">
                        <i class="bi bi-tools text-info fs-2 mb-2"></i>
                        <h2>{{ $complaint_in_progress }}</h2>
                        <p>In Progress</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box p-4 shadow-sm">
                        <i class="bi bi-check-circle text-success fs-2 mb-2"></i>
                        <h2>{{ $complaint_completed }}</h2>
                        <p>Completed</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Complaints Table -->
    <section class="pb-5">
        <div class="container">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white fw-bold"
                    style="background: linear-gradient(90deg, #003973, #1e5799, #2989d8);">
                    <i class="bi bi-list-check me-2"></i>Complaint List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="complaintTable" class="table table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Complaint ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Submitted By</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($complaints_data as $k => $item)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>Complaint-{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><span class="badge bg-warning text-dark">{{ ucwords(str_replace('_', ' ', $item->complaint_status)) }}</span></td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                        <td><a href="{{ route('complaint_details',$item->id) }}" class="btn btn-sm btn-outline-primary"><i
                                                    class="bi bi-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
