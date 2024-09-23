<h1><?php echo htmlspecialchars($title); ?></h1>
<?php if (isset($_SESSION['user_id'])): ?>
    <h2 class="username">Logged in as "<?php echo $_SESSION["user_name"] ?>"</h2>
<?php endif; ?>
<form action="index.php" method="POST">
    <label for="category">Select a category:</label>
    <select id="category" name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option
                value="<?php echo htmlspecialchars($category['category_id']); ?>">
                <?php echo htmlspecialchars($category['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submti">Filter</button>
</form>
<?php if (!empty($posts)): ?>

    <div class="posts-wrapper">
        <ul>
            <?php foreach ($posts as $post): ?>
                <div class="blog-post">
                    <li>

                        <a class="post-username" href="/blog_app/user.php?user_id=<?php echo htmlspecialchars($post['user_id']) ?>">
                            <?php echo htmlspecialchars($post['user_name']) ?>
                        </a>
                        <p class="category">
                            <?php echo $blogPostModel->get_category_name($post['category_id']) ?>
                        </p>
                        <a href="/blog_app/post.php?blog_id=<?php echo htmlspecialchars($post['blog_id']) ?>">
                            <h2><?php echo htmlspecialchars($post['title']); ?></h2>

                            <small>Posted on <?php echo htmlspecialchars($post['created_timestamp']); ?></small>
                            <p class="post-content"><?php echo htmlspecialchars(substr($post['content'], 0, 250) . '...'); ?></p>
                        </a>
                    </li>
                </div>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <p>No posts available.</p>
<?php endif; ?>