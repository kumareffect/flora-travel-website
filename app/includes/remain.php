<header id="header">
    <div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent ; top: 600">
        <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold">
            <div class="uk-container">
                <div class="uk-position-z-index" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo" href="index.html"><img alt="Kumar Site" src="<?php echo BASE_URL . '/image/logo.png' ?>"></a>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="<?php echo BASE_URL . '' ?>">Home</a></li>
                            <li><a href="<?php echo BASE_URL . '/services' ?>">Services</a></li>
                            <li><a href="<?php echo BASE_URL . '/projects' ?>">Projects</a></li>
                            <li><a href="<?php echo BASE_URL . '/tutorial' ?>">Tutorial</a></li>
                            <li><a href="<?php echo BASE_URL . '/contact' ?>">Contact</a></li>

                            <?php if (isset($_SESSION['id'])): ?>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                        <?php echo $_SESSION['username']; ?>
                                        <i class="fa fa-chevron-down" style="font-size: .8em;"></i></a>
                                    <ul>
                                        <?php if($_SESSION['admin']): ?>

                                        <li><a style="text-decoration: none;" href="<?php echo BASE_URL . '/projects/update'; ?>" >Project Update</a></li>
                                        <?php endif; ?>
                                        <li><a style="text-decoration: none;" href="<?php echo BASE_URL . '/php/logout.php' ?>" class="logout">Logout</a></li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li><a href="<?php echo BASE_URL . '/login' ?>">Login</a></li>
                            <?php endif; ?>
                        </ul>



                        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
                                    data-uk-navbar-toggle-icon></span></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>