<footer>
    <nav class="nav-bot">
        <!-- menu bar like header-->
        <h2>Main Links</h2>
        <ul class="ul-footer">
            <li class="li-footer">
                <h3 class="hover-3"><a href="index.php">Home</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="about.php">About</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="movies_list.php">Movies</a></h3>
            </li>
            <?php if (isset($_SESSION['id'])) : ?>
                <li class="li-footer">
                    <h3 class="hover-3"><a href="index.php">My Page</a></h3>
                <li class="li-footer">
                    <h3 class="hover-3"><a href="logout.php">Log out</a></h3>
                </li>
            <?php else : ?>
                <li class="li-footer">
                    <h3 class="hover-3"><a href="register.php">Register</a></h3>
                </li>
                <li class="li-footer">
                    <h3 class="hover-3"><a href="login.php">Login</a></h3>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <!-- addition info/ pages -->
    <nav class="nav-bot">
        <h2>Additional Links</h2>
        <ul class="ul-footer">
            <li class="li-footer">
                <h3 class="hover-3"><a href="career.php">Career</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="company.php">Company</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="policy.php">Privat Policy</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="terms.php">Terms of Use</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="documents.php">Documents</a></h3>
            </li>
        </ul>
    </nav>
    <!-- my contact -->
    <nav class="nav-bot">
        <h2>Contact Info</h2>
        <ul class="ul-footer">
            <li class="li-footer">
                <h3 class="hover-3"><a href="tel:+420722391422">&#9742; Phone Number</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="mailto:kononmi1@cvut.cz">&#9993; Email</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="https://github.com/SMARTcla">&#128736; GitHub</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="https://www.linkedin.com/in/mykhailo-kononenko/">&#128190; LinkedIn</a></h3>
            </li>
            <li class="li-footer">
                <h3 class="hover-3"><a href="https://www.instagram.com/misha_kononenko8/">&#128277; Instagram</a></h3>
            </li>
        </ul>
    </nav>
    <h2>
        Created by Kononenko Mykhailo <br>&#169;FEL-2022
    </h2>
</footer>