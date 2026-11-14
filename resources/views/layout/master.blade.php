<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.10.0/dist/css/adminlte.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cloudflare.com" rel="stylesheet">
    <style>
        body, html{
            height: 100%;
            margin: 0;
            overflow-x: hidden;
            font-family: "Lato", sans-serif;
        }
        .app-sidebar[data-bs-theme="dark"]{
            background-color: #001F3F !important;
        }
        .sidebar-wrapper .nav-item .nav-link:hover{
            background-color: cornflowerblue !important;
            color: #001F3F !important;
        }
        .nav-link.active{
            background-color: rgba(0, 110, 255, 0.44) !important;
            color: white !important;
            font-weight:bold !important;
        }
        .sidebar-brand{
            display: flex !important;
            flex: 0 0 auto!important;
            align-items: center!important;
            justify-content: left!important;
        }
        .sidebar-wrapper{
            padding-right: ;
        }
        .brand-text{
            font-weight: 400 !important;
        }
    </style>
  <title>Laboratiorium JTIF UNG</title>

</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <div class="app-wrapper">

    <!-- Header -->
    <nav class="app-header navbar navbar-expand bg-body">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                @yield('header')
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Sidebar -->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <div class="sidebar-brand">
        <a href="#" class="brand-link">
          <span class="brand-text">Peminjaman Lab</span>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
           @if ($role == 'mahasiswa')
            @include('layout.sidebar-mahasiswa')
           @endif
           @if ($role == 'aslab')
            @include('layout.sidebar-aslab')
           @endif
           @if ($role == 'admin')
            @include('layout.sidebar-admin')
           @endif
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main content -->
    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <h3 class="mb-0">
            @yield('title')
          </h3>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
                @yield('card-header')
                <h5 class="card-title"></h5>
            </div>
            <div class="card-body">
                @yield('card-body')
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

    <script src="https://jsdelivr.net"></script>
    <script src="https://jsdelivr.net"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.10.0/dist/js/adminlte.min.js"></script>
    
</body>
</html>