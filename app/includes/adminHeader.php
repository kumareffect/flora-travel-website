<header>
    <a href="<?php echo BASE_URL . ''; ?>"><img style="position: relative; top: 12px; left: 12px;" alt="Web Graph" src="<?php echo BASE_URL . '/image/logo.png' ?>"></a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <?php if (isset($_SESSION['username'])): ?>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                
                    <li><a style="color: #1a1a1a;" href="<?php echo BASE_URL . '/booking/update'; ?>" >Booking Update</a></li>
                    <li ><a href="<?php echo BASE_URL . '/php/logout.php' ?>" class="logout">Logout</a></li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</header>