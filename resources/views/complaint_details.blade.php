@extends('layouts.front')

@section('content')
    <section id="printArea" class="py-5 flex-grow-1 bg-light">
        <div class="container">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-gradient-primary text-white py-4">
                    <h3 class="mb-0">Complaint #-{{ $complaint->id }} - {{ $complaint->title }}</h3>
                </div>
                <div class="card-body p-5">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Status:</strong> <span class="badge bg-info">{{ ucwords(str_replace('_', ' ', $complaint->complaint_status)) }}</span></p>
                            <p><strong>Submitted On:</strong> {{ date('d M, Y', strtotime($complaint->created_at)) }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p><strong>Location:</strong> {{ $complaint->address }}</p>
                        </div>
                    </div>

                    <div class="details-box bg-white p-4 rounded-4 shadow-sm mb-4">
                        <h5 class="fw-bold mb-3">Complaint Description</h5>
                        <p class="mb-0 text-muted">{{ $complaint->description }}</p>
                    </div>

                    <div class="details-box bg-white p-4 rounded-4 shadow-sm">
                        <h5 class="fw-bold mb-3">Action Taken</h5>
                        <ul class="timeline list-unstyled mb-0">
                            @forelse ($complaint->complaint_details as $reply)
                                <li><span class="fw-bold">{{ date('d M, Y', strtotime($reply->created_at)) }}:</span> {{ $reply->remarks }}</li>
                            @empty
                                <li><span class="fw-bold">Not Taken Any Action Yet!</span></li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('complaints') }}" class="btn btn-outline-primary px-5">Back to Overview</a>
                        <a href="{{ route('complaint_details_print',$complaint->id) }}" class="btn btn-outline-primary px-5">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
function printSection() {
    var printContent = document.getElementById("printArea").innerHTML;
    var originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>

@endsection
