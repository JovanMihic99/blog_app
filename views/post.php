<h1><?php echo htmlspecialchars($title); ?></h1>
<!-- fix this -->
<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $post['user_id']): ?>
    <a href="/blog_app/delete_blog.php?blog_id=<?php echo $post['blog_id']; ?>"
        class="delete-post"
        onclick="return confirm('Are you sure you want to delete this post?');">
        DELETE POST
    </a>
    <a href="/blog_app/edit_blog.php?blog_id=<?php echo $post['blog_id']; ?>"
        class="edit-post"
        onclick="return confirm('Are you sure you want to edit this post?');">
        Edit
    </a>
<?php endif; ?>
<p class="blog-text"><?php echo htmlspecialchars($content); ?></p>
<div class="comments-wrapper">
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

                <div class="comment-container">

                    <li class="comment" id="comment-<?php echo $comment['comment_id'] ?>">

                        <a class="comment-username" href="/blog_app/user.php?user_id=<?php echo htmlspecialchars($comment['user_id']) ?>">
                            <?php echo htmlspecialchars($comment['user_name']); ?>
                        </a>
                        <i><small>Commented on <?php echo htmlspecialchars($comment['created_at']); ?></small></i>
                        <br>
                        <p class="comment-content"><?php echo htmlspecialchars($comment['content']) ?></p>

                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $comment['user_id']): ?>
                            <a href="/blog_app/delete_comment.php?comment_id=<?php echo $comment['comment_id']; ?>&blog_id=<?php echo $blog_id ?>"
                                class="delete-comment"
                                onclick="return confirm('Are you sure you want to delete this comment?');">
                                DELETE
                            </a>

                        <?php endif; ?>


                    </li>
                </div>

            <?php endforeach; ?>
        </ul>

    <?php else: ?>
        <hr>
        <p>No comments available.</p>
    <?php endif; ?>
</div>