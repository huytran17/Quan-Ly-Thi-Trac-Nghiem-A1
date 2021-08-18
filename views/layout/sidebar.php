<nav class="navbar bg-light">
    <ul class="navbar-nav w-100">
        <li class="nav-item <?php echo in_array(array_keys($_GET)[0], ['profile', 'viewprofile', 'addprofile', 'editprofile']) ? 'active' : '' ?>">
            <a href="?profile" class="nav-link">
                <span>Quản lý hồ sơ</span>
            </a>
        </li>
        <li class="nav-item <?php echo in_array(array_keys($_GET)[0], ['room', 'viewroom', 'addroom', 'editroom']) ? 'active' : '' ?>">
            <a class="nav-link" href="?room">Phòng thi</a>
        </li>
        <li class="nav-item <?php echo in_array(array_keys($_GET)[0], ['prot', 'viewprot', 'addprot', 'editprot']) ? 'active' : '' ?>">
            <a class="nav-link" href="?prot">Biên bản</a>
        </li>
        <li class="nav-item <?php echo in_array(array_keys($_GET)[0], ['rule', 'viewrule', 'addrule', 'editrule']) ? 'active' : '' ?>">
            <a class="nav-link" href="?rule">
                <span>Quản lý quy định</span>
            </a>
        </li>
        <li class="nav-item <?php echo in_array(array_keys($_GET)[0], ['report', 'viewreport', 'addreport', 'editreport']) ? 'active' : '' ?>">
            <a class="nav-link" href="?report">
                <span>Báo cáo</span>
            </a>
        </li>
    </ul>
</nav>
</div>

<div class="col-10" style="border-left: 1px solid #2580E2;">