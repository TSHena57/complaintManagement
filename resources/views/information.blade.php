@extends('layouts.front')

@section('content')
    <!-- Page Header -->
    <section class="py-5 text-center text-white" style="background: linear-gradient(90deg, #003973, #1e5799, #2989d8);">
        <div class="container">
            <h1 class="fw-bold mb-2">Information Form</h1>
            <p class="lead opacity-75">Submit and Receive your Mail</p>
        </div>
    </section>

    <!-- Counter Section -->
    <section class="py-5">
        <div class="container">
            <div class="card shadow-sm mx-auto" style="max-width: 600px;">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Student Information Form</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('student.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Student ID</label>
                            <input type="text" class="form-control" name="student_id" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Batch</label>
                            <input type="text" class="form-control" name="batch" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Website Link</label>
                            <input type="url" class="form-control" name="website" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <button class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
