<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Maker | @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar.collapsed {
            width: 0;
            padding-top: 0;
            overflow: hidden;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            font-weight: 500;
        }
        .sidebar .nav-link.active, .sidebar .nav-link.active:hover {
            background-color: #495057;
            color: white;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
        }
        .sidebar .navbar-brand {
            font-size: 1.5rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
        }
        .content-wrapper.collapsed {
            margin-left: 0;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 2px -2px gray;
            z-index: 1000;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #e9ecef;
            overflow-y: auto;
        }
    </style>

    @stack('css')
</head>
<body>
@include('layouts.sidebar')

<div class="content-wrapper">
    @include('layouts.navbar')

    <div class="content">
        <div class="container mt-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        @yield('content')
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Sidebar toggle
    $('#sidebarToggle').on('click', function() {
        $('.sidebar').toggleClass('collapsed');
        $('.content-wrapper').toggleClass('collapsed');
    });

    // Highlight the active link in the sidebar
    $(document).ready(function() {
        const path = window.location.pathname;
        $('.sidebar .nav-link').each(function() {
            if ($(this).attr('href') === path) {
                $(this).addClass('active');
            }
        });
    });
</script>

@stack('scripts')
</body>
</html>
