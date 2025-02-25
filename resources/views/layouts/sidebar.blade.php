 <!-- Start::app-sidebar -->
 <aside class="app-sidebar sticky" id="sidebar">

     <!-- Start::main-sidebar-header -->
     <div class="main-sidebar-header">
        <a href="index.html" class="header-logo d-flex align-items-center">
            {{-- <i class="fas fa-tooth" style="font-size: 30px; margin-right: 10px;"></i>  <!-- أيقونة سن --> --}}
            <span class="desktop-logo">Dentist Clinic</span>
            <span class="toggle-logo">Dentist Clinic</span>
            <span class="desktop-dark">Dentist Clinic</span>
            <span class="toggle-dark">Dentist Clinic</span>
        </a>
    </div>
    
    
    
    
     <!-- End::main-sidebar-header -->

     <!-- Start::main-sidebar -->
     <div class="main-sidebar" id="sidebar-scroll">

         <!-- Start::nav -->
         <nav class="main-menu-container nav nav-pills flex-column sub-open">
             <div class="slide-left" id="slide-left">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                     viewBox="0 0 24 24">
                     <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                 </svg>
             </div>
             <ul class="main-menu">
                @role('admin')
            <!-- إدارة الإشعارات واللغات -->
            <li class="slide">
                <a href="{{ route('admin.notifications.index') }}" class="side-menu__item">
                    <i class="fa fa-bell"></i>&nbsp; إدارة الإشعارات
                </a>
            </li>
            <li class="slide">
                <a href="{{ route('languages.index') }}" class="side-menu__item">
                    <i class="fa fa-language"></i>&nbsp; إدارة اللغات
                </a>
            </li>
        
            <!-- الإعدادات -->
            <li class="slide">
                <a href="javascript:void(0);" class="side-menu__item" data-bs-toggle="collapse"
                    data-bs-target="#settingsMenu">
                    <i class="fa fa-cogs"></i>&nbsp; الإعدادات
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="#7b8191" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                    </svg>
                </a>
                <ul class="collapse" id="settingsMenu">
                    <li class="slide">
                        <a href="{{ route('admin.settings.index') }}" class="side-menu__item">
                            <i class="fa fa-bell"></i>&nbsp; الإشعارات
                        </a>
                    </li>
                    <li class="slide">
                        <a href="{{ route('admin.socialite-settings.index') }}" class="side-menu__item">
                            <i class="fa fa-share-alt"></i>&nbsp; التواصل الاجتماعي
                        </a>
                    </li>
                </ul>
            </li>
                <!-- إدارة المستخدمين والصلاحيات -->
                <li class="slide">
                    <a href="{{ route('users.index') }}" class="side-menu__item">
                        <i class="fa fa-users"></i>&nbsp; إدارة المستخدمين
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.roles.index') }}" class="side-menu__item">
                        <i class="fa fa-user-shield"></i>&nbsp; إدارة الأدوار
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.permissions.index') }}" class="side-menu__item">
                        <i class="fa fa-lock"></i>&nbsp; إدارة الصلاحيات
                    </a>
                </li>
            
                <!-- إدارة الأطباء والمرضى والأقسام -->
                <li class="slide">
                    <a href="{{ route('doctors.index') }}" class="side-menu__item">
                        <i class="fa fa-user-md"></i>&nbsp; إدارة الأطباء
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('patients.index') }}" class="side-menu__item">
                        <i class="fa fa-procedures"></i>&nbsp; إدارة المرضى
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('departments.index') }}" class="side-menu__item">
                        <i class="fa fa-building"></i>&nbsp; إدارة الأقسام
                    </a>
                </li>
            
                <!-- إدارة الجلسات والعلاجات والمواعيد -->
                <li class="slide">
                    <a href="{{ route('appointments.index') }}" class="side-menu__item">
                        <i class="fa fa-calendar-check"></i>&nbsp; إدارة المواعيد
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('treatment-sessions.index') }}" class="side-menu__item">
                        <i class="fa fa-hand-holding-medical"></i>&nbsp; إدارة جلسات العلاج
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('treatments.index') }}" class="side-menu__item">
                        <i class="fa fa-heartbeat"></i>&nbsp; إدارة العلاجات
                    </a>
                </li>
            
                <!-- إدارة الوصفات الطبية والأدوية -->
                <li class="slide">
                    <a href="{{ route('prescriptions.index') }}" class="side-menu__item">
                        <i class="fa fa-file-medical"></i>&nbsp; إدارة الوصفات الطبية
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('medications.index') }}" class="side-menu__item">
                        <i class="fa fa-pills"></i>&nbsp; إدارة الأدوية
                    </a>
                </li>
            
                <!-- إدارة الفواتير -->
                <li class="slide">
                    <a href="{{ route('invoices.index') }}" class="side-menu__item">
                        <i class="fa fa-file-invoice-dollar"></i>&nbsp; إدارة الفواتير
                    </a>
                </li>
            
                
            
                @endrole
            </ul>
            
            
             <div class="slide-right" id="slide-right">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                     viewBox="0 0 24 24">
                     <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                     </path>
                 </svg>
             </div>
         </nav>
         <!-- End::nav -->

     </div>
     <!-- End::main-sidebar -->

 </aside>
 <!-- End::app-sidebar -->
