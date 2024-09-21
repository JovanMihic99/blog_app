<h1><?php echo htmlspecialchars($title); ?></h1>
<h2><?php echo $_SESSION["user_name"] ?></h2>
<p>Welcome to the blog! Here you can find various articles and updates.</p>

<h1>Blog Posts</h1>

<?php if (!empty($posts)): ?>

    <ul>
        <?php foreach ($posts as $post): ?>
            <a href="/blog_app/post.php?blog_id=<?php echo htmlspecialchars($post['blog_id']) ?>">
                <div>
                    <li>
                        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                        <a href="/blog_app/user.php?user_id=<?php echo htmlspecialchars($post['user_id']) ?>">
                            <?php echo htmlspecialchars($post['user_name']) ?>
                        </a>
                        <br>
                        <small>Posted on <?php echo htmlspecialchars($post['created_timestamp']); ?></small>
                        <p><?php echo htmlspecialchars(substr($post['content'], 0, 250) . '...'); ?></p>
                    </li>
                </div>
            </a>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No posts available.</p>
<?php endif; ?>