<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar bg-white border py-3">
        <div class="container d-flex col justify-content-between">
            <a class="fw-bold text-decoration-none text-black fs-4" href="/">BerbagiNow</a>
            <div class="d-flex w-auto gap-5">
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a class="text-decoration-none text-black" href="/admin/dashboard">Dashboard</a>
                        <a class="text-decoration-none text-black" href="/admin/volunteer">Volunteer</a>
                        <a class="text-decoration-none text-black" href="/">Menu 3</a>
                    @else
                        <a class="text-decoration-none text-black" href="/volunteer/dashboard">Dashboard</a>
                        <a class="text-decoration-none text-black" href="/">Menu 2</a>
                        <a class="text-decoration-none text-black" href="/">Menu 3</a>
                    @endif
                @else
                    <a class="text-decoration-none text-black" href="/#about">About</a>
                    <a class="text-decoration-none text-black" href="/#contact">Contact</a>
                    <a class="text-decoration-none text-black" href="/donate">Donate</a>
                @endauth
            </div>
            @auth
                <div class="d-flex gap-2">
                    <a class="btn bg-black text-white" href="/logout">Logout</a>
                    <a class="btn text-black border border-black" href="{{ url('profile/' . Auth::user()->id) }}">Profil</a>
                </div>
            @else
                <a class="btn bg-black text-white" href="/login">Login</a>
            @endauth
        </div>
    </nav>
    <div class="min-vh-100" style="height: 100%;">
        <div class="container h-100 ">@yield('content')</div>
    </div>
    <footer class="border col-12 py-3 d-flex align-items-center justify-content-center">
        <span>© <b>BerbagiNow</b> 2025.</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
