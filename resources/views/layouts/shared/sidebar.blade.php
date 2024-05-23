<style>
    .sidebar {
        background-color: #545b56; /* Set your desired background color here */
    }
    
    .menu-title,
    .sidebar-menu a span {
        color: rgb(246, 239, 239); /* Set the color of titles and menu items to white */
    }
    
    .sidebar-menu .submenu a i.fa {
        color: white; /* Set the color of icons within submenu items to white */
    }
</style>

<style>
    .sidebar-menu ul li a {
        color: white; /* Set the color of all list items to white */
    }
</style>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu" id="sidebar-menu">
            <ul>
                <li>
                    <a href="/"><span class="menu-side"><i class="fa-solid fa-house"></i></span>
                        <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="maps">
                        <span class="menu-side"><i class="fas fa-map-marker-alt"></i></span>
                        <span>Map</span>
                    </a>
                </li>

				<li>
                    <a href="deads">
                        <span class="menu-side"><i class="fa fa-cross"></i></span>
                        <span>Dead</span>
                    </a>
                </li>

                <li>
                    <a href="reservations">
                        <span class="menu-side"><i class="fa fa-times"></i></span>
                        <span>Reservation</span>
                    </a>
                </li>

                <li>
                    <a href="orders">
                        <span class="menu-side"><i class="fa fa-users"></i></span>
                        <span>Work order</span>
                    </a>
                </li>
                

                <li class="menu-title">Setup</li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
                        <span>User Management</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: none;">
                        <li><a href="/user">Users</a></li>
						
                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="#"><i class="fa fa-user-shield" style="color: white;"></i> <span style="color: white;">Authentication</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="/role"><span style="color: white;">Role</span></a></li>
                        <li><a href="/permission"><span style="color: white;">Permission</span></a></li>
                    </ul>
                </li> --}}

				

				

				

            </ul>
        </div>
    </div>
</div>
