<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link" href="/admin/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Add </div>
                <a class="nav-link collapsed" href="/admin/?s=tutorials">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Add Tutorial
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="/admin/?s=addcode">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Add Code
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="/admin/?s=project">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Add Project
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="sb-sidenav-menu-heading">User</div>
                <a class="nav-link" href="/admin/?s=users">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    See Users
                </a>
                <a class="nav-link" href="/admin/?s=comments">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    See Comments
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?= $_SESSION['user'] ?>
        </div>
    </nav>
</div>