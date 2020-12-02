<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>User<i class="right fas fa-angle-left"></i></p>
    </a>

    <ul class="nav nav-treeview">
        <?php if (!checkMenu('user/admin')) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/users/') ?>">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Web User</p>
                </a>
            </li>


        <?php } ?>
        <?php if (!checkMenu('user/register')) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/users/register') ?>">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Register</p>
                </a></li>
        <?php } ?>
    </ul>

</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../../index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
            </a>
        </li>
    </ul>
</li>