<h1><?php echo htmlspecialchars($title); ?></h1>
<form method="POST" action="/blog_app/register.php">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <span class="error-message" style="color: red; display: none;"></span> <!-- Error message for username -->
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <span class="error-message" style="color: red; display: none;"></span> <!-- Error message for email -->
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <span class="error-message" style="color: red; display: none;"></span> <!-- Error message for password -->
    <br>
    <button type="submit">Register</button>
</form>

<?php if (!empty($error)): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<script src="/blog_app/public/js/validation/register.js"></script>