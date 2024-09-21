<!-- nav.php -->
<nav>
    <ul>
        <li><a href="/blog_app/index.php">Home</a></li>
        <li><a href="/blog_app/register.php">Register</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="/blog_app/logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="/blog_app/login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>