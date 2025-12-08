<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complaint #{{ $complaint->id }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }

        .print-card {
            max-width: 850px;
            margin: auto;
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,.15);
        }

        @media print {
            body {
                background: white !important;
            }
            .no-print {
                display: none !important;
            }
            .print-card {
                box-shadow: none !important;
                border: none !important;
                margin: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="container py-5">
        <div class="print-card">

            <h2 class="mb-4 text-center fw-bold">
                Complaint #{{ $complaint->id }}
            </h2>

            <hr>

            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Title:</strong> {{ $complaint->title }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge bg-info">
                            {{ ucwords(str_replace('_', ' ', $complaint->complaint_status)) }}
                        </span>
                    </p>
                    <p><strong>Submitted On:</strong>
                        {{ date('d M, Y', strtotime($complaint->created_at)) }}
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p><strong>Location:</strong> {{ $complaint->address }}</p>
                </div>
            </div>

            <hr>

            <h5 class="fw-bold mb-2">Complaint Description:</h5>
            <p class="text-muted">{{ $complaint->description }}</p>

            <hr>

            <h5 class="fw-bold mb-3">Action Taken:</h5>
            <ul class="list-group">
                @forelse ($complaint->complaint_details as $reply)
                    <li class="list-group-item">
                        <strong>{{ date('d M, Y', strtotime($reply->created_at)) }}:</strong>
                        {{ $reply->remarks }}
                    </li>
                @empty
                    <li class="list-group-item text-danger fw-bold">
                        No actions taken yet!
                    </li>
                @endforelse
            </ul>

            <div class="text-center mt-4 no-print">
                <a href="{{ route('complaints') }}" class="btn btn-primary px-4">Back</a>
            </div>

        </div>
    </div>

</body>
</html>
