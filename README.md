<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>AdminLTE 4 | Login Page</title>  
        <!--begin::Primary Meta Tags-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="title" content="AdminLTE 4 | Login Page" />
        <meta name="author" content="ColorlibHQ" />
        <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
        <meta
            name="keywords"
            content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
        />
        <!--end::Primary Meta Tags-->
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
        <!--end::Fonts-->
        <!--begin::Third Party Plugin(OverlayScrollbars)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
        <!--end::Third Party Plugin(OverlayScrollbars)-->
        <!--begin::Third Party Plugin(Bootstrap Icons)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
        <!--end::Third Party Plugin(Bootstrap Icons)-->
        <!--begin::Required Plugin(AdminLTE)-->
        <link rel="stylesheet" href="{{ url('css/adminlte.css') }}"/>
        <!--end::Required Plugin(AdminLTE)-->

        <style>
          /* Custom styling for input group & button */
          .input-group {
            border: 1.5px solid #ced4da;
            border-radius: 0.5rem;
            overflow: hidden;
          }

          .input-group .form-control {
            border: none;
            box-shadow: none;
            border-radius: 0;
            padding: 0.75rem 1rem;
          }

          .input-group-text {
            background-color: #f8f9fa;
            border: none;
            color: #495057;
            font-size: 1.2rem;
            padding: 0 1rem;
          }

          .form-control:focus {
            outline: none;
            box-shadow: none;
          }

          .form-control:focus + .input-group-text,
          .form-control:focus {
            border-color: #0d6efd; /* Bootstrap primary blue */
          }

          .btn-primary {
            border-radius: 0.5rem;
            padding: 0.65rem;
            font-weight: 600;
          }

          .d-grid.gap-2 {
            margin-top: 1rem;
          }

          p.mb-1 {
            text-align: center;
            margin-top: 1.25rem;
          }

          p.mb-1 a {
            font-weight: 600;
            color: #0d6efd;
            text-decoration: none;
          }

          p.mb-1 a:hover {
            text-decoration: underline;
            color: #0a58ca;
          }
        </style>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body class="login-page bg-body-secondary">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}">{{ config('app.name')}}</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="login-box-msg">Enter One Time Password</p>
                    <form action="{{ url('one-time-password') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="number" name="one_time_password" class="form-control  @error('one_time_password') is-invalid @enderror" placeholder="Enter one time password" />
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                            @error('one_time_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- /.social-auth-links -->
                    <p class="mb-1"><a href="{{ route('login') }}">Login Here</a></p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
        <!--begin::Third Party Plugin(OverlayScrollbars)-->
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
        <!--end::Third Party Plugin(OverlayScrollbars)-->
        <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <!--end::Required Plugin(popperjs for Bootstrap 5)-->
        <!--begin::Required Plugin(Bootstrap 5)-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <!--end::Required Plugin(Bootstrap 5)-->
        <!--begin::Required Plugin(AdminLTE)-->
        <script src="{{ url('js/adminlte.js') }}"></script>
        <!--end::Required Plugin(AdminLTE)-->
        <!--begin::OverlayScrollbars Configure-->
        <script>
            const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
            const Default = {
                scrollbarTheme: "os-theme-light",
                scrollbarAutoHide: "leave",
                scrollbarClickScroll: true,
            };
            document.addEventListener("DOMContentLoaded", function () {
                const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
                if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined") {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: {
                            theme: Default.scrollbarTheme,
                            autoHide: Default.scrollbarAutoHide,
                            clickScroll: Default.scrollbarClickScroll,
                        },
                    });
                }
            });
        </script>
        <!--end::OverlayScrollbars Configure-->
        <!--end::Script-->
    </body>
    <!--end::Body-->
</html>
