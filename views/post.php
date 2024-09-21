<h1><?php echo htmlspecialchars($title); ?></h1>
<p><?php echo htmlspecialchars($content); ?></p>

<?php if (!empty($comments)): ?>
    <ul>
        <?php foreach ($comments as $comment): ?>

            <div>
                <hr>
                <li>
                    <a class="comment_username" href="/blog_app/user.php?user_id=<?php echo htmlspecialchars($comment['user_id']) ?>">
                        <?php echo htmlspecialchars($comment['user_name']); ?>
                    </a>
                    <small>Commented on <?php echo htmlspecialchars($comment['created_at']); ?></small>
                    <br>
                    <p><?php echo htmlspecialchars($comment['content']) ?></p>

                </li>
            </div>

        <?php endforeach; ?>
    </ul>

<?php else: ?>
    <hr>
    <p>No comments available.</p>
<?php endif; ?>