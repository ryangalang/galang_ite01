<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ITP17 - Project - {{ $page_title }}</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: background-color 0.3s, color 0.3s;
    }

    .navbar {
      background-color: var(--bs-body-bg);
      border-bottom: 1px solid var(--bs-border-color-translucent);
    }

    .navbar .nav-link {
      color: var(--bs-body-color);
      transition: color 0.2s;
    }

    .navbar .nav-link:hover,
    .navbar .nav-link.active {
      color: var(--bs-primary);
    }

    .dropdown-menu {
      border-radius: 0.5rem;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }

    .navbar-search {
      max-width: 300px;
    }

    main.container {
      background-color: var(--bs-body-bg);
      padding: 2rem 2.5rem;
      border-radius: 16px;
      border: 1px solid var(--bs-border-color-translucent);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: background-color 0.3s ease;
    }

    .theme-toggle-btn {
      border: none;
      background: none;
      font-size: 1.5rem;
      cursor: pointer;
    }

    input.form-control,
    button.btn {
      border-radius: 8px;
    }

    input.form-control:focus {
      border-color: var(--bs-primary);
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    footer {
      border-top: 1px solid var(--bs-border-color-translucent);
      padding: 1.5rem 0;
    }
  </style>

  @yield('css')
</head>
<body>

  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm px-3">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="#">ITP17</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="studentsDropdown" data-bs-toggle="dropdown">Students</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/students">Student List</a></li>
                <li><a class="dropdown-item" href="/students/create">Add New Student</a></li>
              </ul>
            </li>
          </ul>
          <div class="d-flex align-items-center gap-3">
            <form class="d-flex navbar-search" role="search" action="/search" method="GET">
              <input class="form-control me-2" type="search" name="query" placeholder="Search...">
              <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i>🌙</button>
            </form>
            <button class="theme-toggle-btn" id="themeToggle" title="Toggle Light/Dark">🌙</button>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="container my-5">
    <h1 class="mb-4 text-dark-emphasis">{{ $page_title }}</h1>
    @yield('content')
  </main>

  <!-- Toast Container -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastContainer"></div>

  <!-- Footer -->
  <footer class="text-center">
    <small>&copy; 2025 ITP17 - All rights reserved.</small>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Dark Mode Toggle with Persistence -->
  <script>
    const toggleBtn = document.getElementById('themeToggle');
    const html = document.documentElement;

    function updateThemeIcon() {
      const currentTheme = html.getAttribute('data-bs-theme');
      toggleBtn.textContent = currentTheme === 'dark' ? '☀️' : '🌙';
    }

    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
      html.setAttribute('data-bs-theme', storedTheme);
    }

    toggleBtn.addEventListener('click', () => {
      const currentTheme = html.getAttribute('data-bs-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      html.setAttribute('data-bs-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      updateThemeIcon();
    });

    updateThemeIcon();
  </script>

  <!-- Toast Message Utility -->
  <script>
    function showToast(message, type = 'success') {
      const toastHTML = `
        <div class="toast align-items-center text-white bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>`;
      const container = document.getElementById('toastContainer');
      container.innerHTML = toastHTML;
      const toastEl = container.querySelector('.toast');
      new bootstrap.Toast(toastEl).show();
    }
  </script>

  @stack('scripts')
</body>
</html>
