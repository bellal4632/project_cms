<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney"></i></div>
                    Home
                </a>
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Articles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="article-all.php">All</a>
                        <a class="nav-link" href="article-add.php">Add</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#catLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-th"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="catLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="category-all.php">All</a>
                        <a class="nav-link" href="category-add.php">Add</a>
                    </nav>
                </div>
                
                <a class="nav-link" href="menu-all.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-bars"></i></div>
                    Menus
                </a>                
                
                <a class="nav-link" href="carousel-list.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                    Carousels
                </a>
               
                <a class="nav-link" href="admin-users.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>                
                               
                <a class="nav-link" href="admin-comments.php">
                    <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-comments"></i></div>
                    All Comments
                </a>
                
                <a class="nav-link" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-comments"></i></div>
                    Logout
                </a>
                
            </div>
        </div>
        
    </nav>
</div>