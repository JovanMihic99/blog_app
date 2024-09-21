<h1><?php echo htmlspecialchars($title); ?></h1>
<h2><?php echo $_SESSION["user_name"] ?></h2>
<p>Welcome to the blog! Here you can find various articles and updates.</p>

<h1>Blog Posts</h1>

<?php if (!empty($posts)): ?>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                <p><?php echo htmlspecialchars($post['content']); ?></p>
                <small>Posted on <?php echo htmlspecialchars($post['created_at']); ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No posts available.</p>
<?php endif; ?>