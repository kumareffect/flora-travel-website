<header id="header">
  <nav>
    <div class="nav__header">
      <div class="nav__logo">
        <a href="#" class="logo"><img src="<?php echo BASE_URL . '/image/logo.png' ?>" alt="Logo"></a>
      </div>
      <div class="nav__menu__btn" id="menu-btn">
        <i class="ri-menu-line"></i>
      </div>
    </div>

    
    <ul class="nav__links" id="nav-links">
      <li><a href="<?php echo BASE_URL . '' ?>">HOME</a></li>
      <li><a href="#booking">BOOKING</a></li>
      <li><a href="<?php echo BASE_URL . '/recruit' ?>">RECRUIT</a></li>
      <li><a href="<?php echo BASE_URL . '/services' ?>">MENU</a></li>
      <li><a href="<?php echo BASE_URL . '/contact' ?>">CONTACT</a></li>
 

      <?php 
      session_start();
      if (isset($_SESSION['id'])): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
          <ul class="dropdown-menu">
            <?php if ($_SESSION['admin']): ?>
              
              <li><a style="color: #1a1a1a;" href="<?php echo BASE_URL . '/booking/update'; ?>" >Booking Update</a></li>
              <?php endif; ?>
            <li><a href="<?php echo BASE_URL . '/php/logout.php'; ?>" class="logout">Logout</a></li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="../travel/login">Login</a></li>
      <?php endif; ?>
    </ul>

    </nav>
</header>


