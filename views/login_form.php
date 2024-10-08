<h1><?php echo htmlspecialchars($title); ?></h1>
<form class="input-form" method="POST" action="/blog_app/login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Login</button>
</form>

<?php if (!empty($error)): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<script src="/blog_app/public/js/validation/login.js"></script>