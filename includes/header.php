<header>
    <script src="/scripts/menu.js"></script>
    <div class="container">
        <nav id="navigation">
            <img src="images/logo_x2.png" alt="Logo" class="img_logo">
            <ul class="menu-left">
                <!-- check session info if user login and show modes-->
                <?php if (isset($_SESSION['id'])) : ?>
                    <?php if ($_SESSION['mode'] === 'white') : ?>
                        <li class="zwa-name"><a href="index.php?bg=dark">
                                <h1>Darkmode</h1>
                            </a></li>
                    <?php elseif ($_SESSION['mode'] === 'dark') : ?>
                        <li class="zwa-name"><a href="index.php?bg=white">
                                <h1>Whitemode</h1>
                            </a></li>
                    <?php endif; ?>
                <?php endif; ?>

                <li><a href="index.php">
                        <h1>Home</h1>
                    </a></li>
                <li><a href="movies_list.php">
                        <h1>Movies</h1>
                    </a></li>
                <li><a href="about.php">
                        <h1>About</h1>
                    </a></li>
                <!-- check session info if user login and show login/logout -->
                <?php if (isset($_SESSION['id'])) : ?>
                    <li><a href="logout.php">
                            <h1>Logout</h1>
                        </a></li>
                    <?php if ($_SESSION['user_type'] === "admin") : ?>
                        <li><a href="admin.php">
                                <h1>Admin</h1>
                            </a></li>

                    <?php endif; ?>

                <?php else : ?>
                    <!-- if user mnot login -->
                    <li><a href="register.php">
                            <h1>Register</h1>
                        </a></li>
                    <li><a href="login.php">
                            <h1>Login</h1>
                        </a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <hr>
</header>