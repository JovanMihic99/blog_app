<!-- nav.php -->
<nav>
    <div class="nav-container">
        <a href="/blog_app/index.php" class="logo">Bloggy</a>
        <button class="hamburger" aria-label="Toggle navigation">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <ul class="nav-links">
            <li><a href="/blog_app/index.php">Home</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="/blog_app/user.php?user_id=<?php echo $_SESSION['user_id'] ?>">My Profile</a></li>
                <li><a href="/blog_app/add_blog.php">New Post</a></li>
                <li><a href="/blog_app/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="/blog_app/register.php">Register</a></li>
                <li><a href="/blog_app/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>