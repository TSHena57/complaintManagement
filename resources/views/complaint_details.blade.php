@extends('layouts.front')

@section('content')
    <section class="py-5 flex-grow-1 bg-light">
        <div class="container">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-gradient-primary text-white py-4">
                    <h3 class="mb-0">Complaint #12345 - Street Light Not Working</h3>
                </div>
                <div class="card-body p-5">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Status:</strong> <span class="badge bg-info">In Progress</span></p>
                            <p><strong>Submitted On:</strong> 20 October 2025</p>
                            <p><strong>Expected Completion:</strong> 3 November 2025</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p><strong>Location:</strong> Road #12, Block C</p>
                            <p><strong>Assigned Team:</strong> Electrical Maintenance</p>
                        </div>
                    </div>

                    <div class="details-box bg-white p-4 rounded-4 shadow-sm mb-4">
                        <h5 class="fw-bold mb-3">Complaint Description</h5>
                        <p class="mb-0 text-muted">The street lights in my area have not been working for the past two
                            weeks. It’s creating serious safety concerns at night. Immediate repair is needed.</p>
                    </div>

                    <div class="details-box bg-white p-4 rounded-4 shadow-sm">
                        <h5 class="fw-bold mb-3">Action Taken</h5>
                        <ul class="timeline list-unstyled mb-0">
                            <li><span class="fw-bold">20 Oct 2025:</span> Complaint registered by citizen</li>
                            <li><span class="fw-bold">22 Oct 2025:</span> Assigned to Electrical Department</li>
                            <li><span class="fw-bold">25 Oct 2025:</span> Inspection completed</li>
                            <li><span class="fw-bold">28 Oct 2025:</span> Replacement parts ordered</li>
                        </ul>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('complaints') }}" class="btn btn-outline-primary px-5">Back to Overview</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
