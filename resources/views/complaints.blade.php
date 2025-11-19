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
                        <h2>245</h2>
                        <p>Total Complaints</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box p-4 shadow-sm">
                        <i class="bi bi-hourglass-split text-warning fs-2 mb-2"></i>
                        <h2>67</h2>
                        <p>Pending</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box p-4 shadow-sm">
                        <i class="bi bi-tools text-info fs-2 mb-2"></i>
                        <h2>98</h2>
                        <p>In Progress</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box p-4 shadow-sm">
                        <i class="bi bi-check-circle text-success fs-2 mb-2"></i>
                        <h2>80</h2>
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
                                <tr>
                                    <td>1</td>
                                    <td>CP-1001</td>
                                    <td>Network Issue</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>John Doe</td>
                                    <td>2025-11-01</td>
                                    <td><a href="{{ route('complaint_details',1) }}" class="btn btn-sm btn-outline-primary"><i
                                                class="bi bi-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>CP-1002</td>
                                    <td>Server Down</td>
                                    <td><span class="badge bg-info text-dark">In Progress</span></td>
                                    <td>Jane Smith</td>
                                    <td>2025-10-30</td>
                                    <td><a href="{{ route('complaint_details',1) }}" class="btn btn-sm btn-outline-primary"><i
                                                class="bi bi-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>CP-1003</td>
                                    <td>Unauthorized Access</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>Alex Johnson</td>
                                    <td>2025-10-25</td>
                                    <td><a href="{{ route('complaint_details',1) }}" class="btn btn-sm btn-outline-primary"><i
                                                class="bi bi-eye"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
