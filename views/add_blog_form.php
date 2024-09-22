<div class="form-container">
    <h2>Add New Blog Post</h2>

    <form action="/blog_app/add_blog.php" method="POST">
        <input type="hidden" name="action" value="add_post">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <label for="category">Select a category:</label>
            <select id="category" name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category['category_id']); ?>">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn">Submit</button>
    </form>
</div>