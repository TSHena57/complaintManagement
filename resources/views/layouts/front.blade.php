<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Management - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
                <i class="bi bi-shield-check me-2"></i>Complaint Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link @if (Route::is('home')) active @endif"
                            href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link @if (Route::is('complaints')) active @endif"
                            href="{{ route('complaints') }}">Complaints</a></li>
                    <li class="nav-item"><a class="nav-link @if (Route::is('login')) active @endif"
                            href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="footer mt-auto py-3 text-center text-white bg-dark">
        <p class="mb-0">&copy; 2025 Complaint Portal. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Counter Animation
        const counters = document.querySelectorAll('[data-count]');
        const speed = 100; // smaller = faster
        const animateCounters = () => {
            counters.forEach(counter => {
                const update = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const increment = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(update, 25);
                    } else {
                        counter.innerText = target;
                    }
                };
                update();
            });
        };
        window.addEventListener('scroll', () => {
            const sectionTop = document.querySelector('.counter-box').offsetTop;
            if (window.scrollY + window.innerHeight > sectionTop + 100) animateCounters();
        }, {
            once: true
        });
    </script>
</body>

</html>
