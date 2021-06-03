<div class="app-sidebar colored">
	<div class="sidebar-header">
		<a class="header-brand" href="#">
			<div class="logo-img">
				<img title="IBSI i-Hear" src="/src/img/iHear.png" class="rounded" style="width:30px; height:auto;" class="header-brand-img" alt="ibsi hris"> 
			</div>
			<span class="text navbar-brand">Interlink</span>
		</a>
		<a href="#" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></a>
		<a href="#" id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></a>
	</div>
	<div class="sidebar-content ps ps--active-y">
		<div class="nav-container">
			<!-- NAVIGATION -->
			<nav id="main-menu-navigation" class="navigation-main">
				<div class="nav-lavel">Church Portal</div>
				<div class="nav-item">
					<a class="menu-item" href="{{ url('home') }}"><i class="fab fa-dashcube fa-fw"></i><span>Dashboard</span></a>
				</div>         
				<div class="nav-item" hidden>
					<a class="menu-item" href=""><i class="fa fa-address-card fa-fw"></i><span>My Profile</span></a>
				</div>
				<div class="nav-item has-sub" hidden>
					<a href="#"><i class="fa fa-sitemap fa-fw"></i><span>Organization</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="">By User</a>
                        <a class="menu-item" href="">By Department</a>
						<a class="menu-item" href="">By Division</a>
						<a class="menu-item" href="">By Position</a>
						<a class="menu-item" href="">By Tenure</a>
					</div>
				</div>



				<div class="nav-item has-sub">
					<a href="#"><i class="fa fa-sitemap fa-fw"></i><span>Accounts</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="{{ url('accountsbyname') }}">By Name</a>
						<a class="menu-item" href="">By Location</a>
					</div>
				</div>

				<div class="nav-item has-sub">
					<a href="#"><i class="fas fa-church fa-fw"></i><span>Members</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="{{ url('membersbyname') }}">By Name</a>
						<a class="menu-item" href="">By Account</a>
						<a class="menu-item" href="">By Location</a>
					</div>
				</div>

				<div class="nav-item has-sub">
					<a href="#"><i class="fas fa-users fa-fw"></i><span>Users</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="{{ url('usersbyname') }}">By Name</a>
						<a class="menu-item" href="">By Account</a>
						<a class="menu-item" href="">By Member</a>
					</div>
				</div>

				<div class="nav-item has-sub">
					<a href="#"><i class="fas fa-file-contract fa-fw"></i><span>Reports</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="">All Documents</a>
						<a class="menu-item" href="">By Account</a>
						<a class="menu-item" href="">By Member</a>
						<a class="menu-item" href="">By People</a>
					</div>
				</div>

				<div class="nav-item has-sub">
					<a href="#"><i class="fas fa-image fa-fw"></i><span>Gallery</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="">Accounts</a>
						<a class="menu-item" href="">Members</a>
					</div>
				</div>

				<div class="nav-item has-sub">
					<a href="#"><i class="fa fa-address-card fa-fw"></i><span>Change Request</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="">Account Profile</a>
						<a class="menu-item" href="">Member Profile</a>
						<a class="menu-item" href="">User Profile</a>
					</div>
				</div>

				<div class="nav-item has-sub">
					<a href="#"><i class="fas fa-cog fa-fw"></i><span>Maintenance</span></a>
					<div class="submenu-content">
						<a class="menu-item" href="">Templates</a>
						<a class="menu-item" href="">Approval Workflow</a>
					</div>
				</div>

			</nav>
			<!-- //NAVIGATION -->                            
		</div>
		<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
			<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
		</div>
		<div class="ps__rail-y" style="top: 0px; height: 597px; right: 0px;">
			<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 248px;"></div>
		</div>
	</div>
</div>