@extends('layouts.front')

@section('content')
    <section class="hero text-center text-white d-flex align-items-center justify-content-center flex-column">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3 animate-fadein">Your Voice Matters</h1>
            <p class="lead mb-4">Submit complaints, track progress, and witness real-time actions by our team.</p>
            <a href="{{ route('complaints') }}" class="btn btn-light btn-lg shadow-sm">View Complaints</a>
        </div>
    </section>

    <!-- Counter Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-3">
                    <div class="counter-box p-4 rounded shadow-sm">
                        <i class="bi bi-megaphone display-5 text-primary mb-3"></i>
                        <h2 class="fw-bold" data-count="320">0</h2>
                        <p class="text-muted">Complaints Submitted</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box p-4 rounded shadow-sm">
                        <i class="bi bi-people display-5 text-success mb-3"></i>
                        <h2 class="fw-bold" data-count="210">0</h2>
                        <p class="text-muted">Registered Users</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box p-4 rounded shadow-sm">
                        <i class="bi bi-gear-wide-connected display-5 text-warning mb-3"></i>
                        <h2 class="fw-bold" data-count="145">0</h2>
                        <p class="text-muted">Complaints In Progress</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box p-4 rounded shadow-sm">
                        <i class="bi bi-check-circle display-5 text-info mb-3"></i>
                        <h2 class="fw-bold" data-count="175">0</h2>
                        <p class="text-muted">Actions Completed</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About / Context Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">How Our System Works</h2>
                <p class="text-muted mt-2">We ensure a transparent, responsive, and efficient complaint management
                    experience.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-card text-center p-4 rounded shadow-sm h-100">
                        <i class="bi bi-pencil-square display-5 text-primary mb-3"></i>
                        <h5 class="fw-bold mb-2">1. Submit Complaint</h5>
                        <p class="text-muted">Easily log your complaint online with complete details from any device,
                            anytime.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-card text-center p-4 rounded shadow-sm h-100">
                        <i class="bi bi-clipboard-check display-5 text-success mb-3"></i>
                        <h5 class="fw-bold mb-2">2. Track Progress</h5>
                        <p class="text-muted">Monitor every stage of the resolution process with real-time updates.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-card text-center p-4 rounded shadow-sm h-100">
                        <i class="bi bi-trophy display-5 text-warning mb-3"></i>
                        <h5 class="fw-bold mb-2">3. Get Resolution</h5>
                        <p class="text-muted">Our team ensures your issue is resolved quickly and transparently.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
