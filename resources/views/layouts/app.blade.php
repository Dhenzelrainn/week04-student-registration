<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Student Registration System built with Laravel"
    >

    <title>
        @yield('title', 'Student Registration System')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body>

<header class="site-header">
    <div class="header-container">

        <a
            href="{{ route('students.create') }}"
            class="brand"
        >
            <span class="brand-icon">
                S
            </span>

            <span class="brand-content">
                <strong>Student Registration</strong>
                <small>Information System</small>
            </span>
        </a>

        <nav class="main-nav">
            <a
                href="{{ route('students.create') }}"
                class="{{ request()->routeIs('students.create') ? 'active' : '' }}"
            >
                Register
            </a>

            <a
                href="{{ route('students.index') }}"
                class="{{ request()->routeIs('students.index') ? 'active' : '' }}"
            >
                Students
            </a>
        </nav>

    </div>
</header>


@if (session('success'))
    <div class="flash-wrapper">

        <div class="flash-message flash-success">

            <div class="flash-icon">
                ✓
            </div>

            <div class="flash-content">
                <strong>Registration successful</strong>
                <span>
                    {{ session('success') }}
                </span>
            </div>

            <button
                type="button"
                class="flash-close"
                aria-label="Close notification"
            >
                ×
            </button>

        </div>

    </div>
@endif


<main class="main-content">
    @yield('content')
</main>


<footer class="site-footer">
    <div class="footer-container">

        <div>
            <strong>Student Registration System</strong>

            <p>
                Secure and organized student information management.
            </p>
        </div>

        <span>
            Laravel Student Registration
        </span>

    </div>
</footer>

</body>
</html>