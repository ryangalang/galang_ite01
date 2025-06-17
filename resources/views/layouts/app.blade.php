<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ITP17 - Project - {{ $page_title }}</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: background-color 0.3s, color 0.3s;
    }

    .navbar-light .navbar-brand,
    .navbar-light .nav-link {
      font-weight: 500;
    }

    .dropdown-menu a:hover {
      background-color: var(--bs-secondary-bg-subtle);
      color: var(--bs-primary);
    }

    .navbar-search {
      max-width: 300px;
    }

    .container {
      background-color: var(--bs-body-bg);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: background-color 0.3s ease;
    }

    .theme-toggle-btn {
      border: none;
      background: none;
      font-size: 1.25rem;
      cursor: pointer;
    }
  </style>

  @yield('css')
</head>
<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm px-3">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">ITP17</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="studentsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Students
              </a>
              <ul class="dropdown-menu" aria-labelledby="studentsDropdown">
                <li><a class="dropdown-item" href="/students">Student List</a></li>
                <li><a class="dropdown-item" href="/students/create">Add New Student</a></li>
              </ul>
            </li>
          </ul>

          <!-- Right Section: Search + Theme Toggle -->
          <div class="d-flex align-items-center gap-3">
            <form class="d-flex navbar-search" role="search" action="/search" method="GET">
              <input class="form-control me-2" type="search" name="query" placeholder="Search..." aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>

            <!-- Dark Mode Toggle -->
            <button class="theme-toggle-btn" id="themeToggle" aria-label="Toggle theme">
              🌙
            </button>
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Dark Mode Toggle Script -->
  <script>
    const toggleBtn = document.getElementById('themeToggle');
    const html = document.documentElement;

    function updateThemeIcon() {
      const currentTheme = html.getAttribute('data-bs-theme');
      toggleBtn.textContent = currentTheme === 'dark' ? '☀️' : '🌙';
    }

    toggleBtn.addEventListener('click', () => {
      const currentTheme = html.getAttribute('data-bs-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      html.setAttribute('data-bs-theme', newTheme);
      updateThemeIcon();
    });

    // Initialize icon
    updateThemeIcon();
  </script>

  @stack('scripts')
</body>
</html>
