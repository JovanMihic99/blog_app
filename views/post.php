<h1><?php echo htmlspecialchars($title); ?></h1>
<p><?php echo htmlspecialchars($content); ?></p>
<hr>
<h3>Comments</h3>
<?php if ($_SESSION['user_id']): ?>
    <div>
        <form action="/blog_app/post.php?blog_id=<?php echo $post['blog_id'] ?>" method="POST">
            <textarea name="content" id="txt_comment"></textarea>
            <button type="submit">Leave a Comment</button>
        </form>
    </div>
<?php else: ?>
    <p> <a href="/blog_app/login.php" style="text-decoration: underline">Login</a> to leave a comment</p>
<?php endif; ?>
<?php if (!empty($comments)): ?>
    <ul>
        <?php foreach ($comments as $comment): ?>

            <div class="comment_container">

                <li class="comment" id="comment-<?php echo $comment['comment_id'] ?>">

                    <a class="comment_username" href="/blog_app/user.php?user_id=<?php echo htmlspecialchars($comment['user_id']) ?>">
                        <?php echo htmlspecialchars($comment['user_name']); ?>
                    </a>
                    <small>Commented on <?php echo htmlspecialchars($comment['created_at']); ?></small>
                    <br>
                    <p class="comment-content"><?php echo htmlspecialchars($comment['content']) ?></p>

                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $comment['user_id']): ?>
                        <a href="/blog_app/delete_comment.php?comment_id=<?php echo $comment['comment_id']; ?>"
                            class="delete-comment"
                            onclick="return confirm('Are you sure you want to delete this comment?');">
                            DELETE
                        </a>
                        <?php echo $_SESSION['user_id']; ?>
                    <?php endif; ?>


                </li>
            </div>

        <?php endforeach; ?>
    </ul>

<?php else: ?>
    <hr>
    <p>No comments available.</p>
<?php endif; ?>