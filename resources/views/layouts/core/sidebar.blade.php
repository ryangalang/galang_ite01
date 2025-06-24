<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  
    <div class="sidebar-brand">
      
        <a href="./index.html" class="brand-link">
            
            <img src="{{ url('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
           
           
            <span class="brand-text fw-light">AdminLTE 4</span>
          
        </a>
     
    </div>
   
    <div class="sidebar-wrapper">
        <nav class="mt-2">
          
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>    
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('client/users') }}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Manage Users</p>
                    </a>
                </li>

                <!-- Students Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Students
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('client/students') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Manage Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('client/students/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New Students</p>
                            </a>    
                        </li>
                    </ul>
                </li>

                <!-- Appointment Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-calendar-check-fill"></i>
                        <p>
                            Appointments
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('client/appointments') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Manage Appointment</p>
                            </a>    
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('client/appointments/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New Appointment</p>
                            </a>    
                        </li>
                    </ul>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
