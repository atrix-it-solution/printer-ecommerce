<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Print-Ecommerce - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        color: black;

    }
    
    .sidebar {
        min-height: 100vh;
        /* background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%); */
        color: black;
        position: fixed;
        width: 280px;
        transition: all 0.3s;
        z-index: 1000;
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        overflow-y: auto;
        overflow-x: hidden;
    }

    .sidebar .nav-link {
        color: black;
        padding: 12px 20px;
        margin: 2px 10px;
        border-radius: 8px;
        /* transition: all 0.3s; */
        display: flex;
        align-items: center;
        font-weight: 500;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        color: white;
        background-color: #3498db;
        transform: translateX(5px);
    }

    .sidebar .nav-link[aria-expanded="true"] {
        background-color: #3498db;
         color: white;
    }

    .sidebar .nav-link i {
        width: 20px;
        margin-right: 10px;
        font-size: 1.1em;
    }

    /* Collapse menu styles */
    .sidebar .collapse {
        margin: 0 16px;
    }

    .sidebar .collapse .nav-link {
        padding: 10px 20px 10px 20px;
        margin: 1px 0;
        border-radius: 5px;
        font-size: 1em;
    }

    .sidebar .collapse .nav-link:hover {
        background-color: #3498db;
        transform: translateX(3px);
        
    }

    .sidebar .collapse .dropdown-divider {
        border-color: #4a6572;
        /* margin: 8px 0; */
    }

    /* Collapse icon animation */
    /* .sidebar .collapse-icon {
        transition: transform 0.3s ease;
    } */

    .sidebar .nav-link[aria-expanded="true"] .collapse-icon {
        transform: rotate(180deg);
    }

    /* Sidebar Header */
    /* .sidebar-header {
        background-color: #34495e;
        border-bottom: 1px solid #4a6572;
        position: sticky;
        top: 0;
        z-index: 1020;
    } */

    .sidebar-header h4 {
        font-weight: 600;
    }

    .main-content {
        margin-left: 280px;
        padding: 20px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    .navbar {
        margin-left: 280px;
        transition: all 0.3s;
    }

    @media (max-width: 768px) {
        .sidebar {
            margin-left: -280px;
        }
        .sidebar.active {
            margin-left: 0;
        }
        .main-content,
        .navbar {
            margin-left: 0;
        }
    }
</style>
</head>
<body>
    <!-- Sidebar -->
    @include('dashboard.layouts.sections.sidebar')

    <!-- Top Navbar -->
    @include('dashboard.layouts.sections.navbar')

    <!-- Main Content -->
    <main class="main-content">
        @yield('dashboard-content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
    </script>

</body>
</html>