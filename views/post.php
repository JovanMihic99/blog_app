<h1><?php echo htmlspecialchars($title); ?></h1>
<p><?php echo htmlspecialchars($content); ?></p>
<hr>
<div>
    <form action="/blog_app/post.php?blog_id=<?php echo $post['blog_id'] ?>" method="POST">
        <textarea name="content" id="txt_comment"></textarea>
        <button type="submit">Leave a Comment</button>
    </form>
</div>

<?php if (!empty($comments)): ?>
    <ul>
        <?php foreach ($comments as $comment): ?>

            <div class="comment_container">

                <li class="comment">
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