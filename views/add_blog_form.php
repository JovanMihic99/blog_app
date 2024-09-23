<div class="form-container">
    <h2>Add New Blog Post</h2>

    <form action="/blog_app/edit_blog.php?blog_id=<?php echo $blog['blog_id'] ?>" method="POST">
        <input type="hidden" name="action" value="add_post">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $blog['title'] ?>" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" required><?php echo $blog['content'] ?></textarea>
        </div>
        <div class=" form-group">
            <label for="category">Select a category:</label>
            <select id="category" name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option
                        value="<?php echo htmlspecialchars($category['category_id']); ?>"
                        <?php if ($blog['category_id'] === $category['category_id']): ?>
                        selected
                        <?php endif; ?>>
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn">Submit</button>
    </form>
</div>