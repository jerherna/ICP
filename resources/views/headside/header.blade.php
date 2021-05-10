<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
     <button type="button" class="nav-link ml-10"><a href="<Computed Value>"><i class="ik ik-home"></a></i></button>
                <div class="dropdown" hidden>
                    <button class="nav-link dropdown-toggle" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href="#"><i class="ik ik-bell"></i><span class="badge bg-danger"></span></a></button>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">Notifications</h4>
                        <div class="notifications-wrap">
            <!-- content will be populated via ajax -->
                        </div>
                        <div class="footer"><a href="javascript:void(0);" onclick="showAllNotif(event);">See all activity</a></div>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar avatar-profile" src="" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                         <a class="dropdown-item" onclick="showBasicInfo();" href="#" hidden><i class="ik ik-user dropdown-icon"></i> My Profile</a>
                        <a class="dropdown-item" href="<Computed Value>"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>