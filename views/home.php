<h1><?php echo htmlspecialchars($title); ?></h1>
<h2><?php echo $_SESSION["user_name"] ?></h2>


<?php if (!empty($posts)): ?>

    <div class="posts-wrapper">
        <ul>
            <?php foreach ($posts as $post): ?>
                <div class="blog-post">
                    <li>
                        <a href="/blog_app/user.php?user_id=<?php echo htmlspecialchars($post['user_id']) ?>">
                            <?php echo htmlspecialchars($post['user_name']) ?>
                        </a>
                        <br>
                        <small>Posted on <?php echo htmlspecialchars($post['created_timestamp']); ?></small>
                        <a href="/blog_app/post.php?blog_id=<?php echo htmlspecialchars($post['blog_id']) ?>">
                            <h2><?php echo htmlspecialchars($post['title']); ?></h2>



                            <p><?php echo htmlspecialchars(substr($post['content'], 0, 250) . '...'); ?></p>
                        </a>
                    </li>
                </div>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <p>No posts available.</p>
<?php endif; ?>