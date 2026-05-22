<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Edit Project - folio.</title>
    <link rel="stylesheet" href="assets/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="assets/create.css?v=<?= time(); ?>">
</head>
<body>

<header class="main-header">
    <div class="header-left">
        <span class="logo" onclick="window.location.href='index.php?page=home'" style="cursor:pointer;">folio<strong>.</strong></span>
    </div>
    <div class="header-right">
        <a href="index.php?page=home" class="nav-link">Discover</a>
        <a href="index.php?page=profile" class="nav-link active">Profile</a>
        <a href="index.php?page=logout" class="btn-login">Log out</a>
    </div>
</header>

<div class="create-fullscreen-wrapper">
    <div class="create-card-container">

        <div class="create-header">
            <h2>Edit Project</h2>
            <p>Update your project details and cover image</p>
        </div>

        <form action="index.php?page=edit&id=<?= $post['id'] ?>" method="POST" class="create-form">

            <div class="form-group">
                <label for="title">Project Name <span class="required">*</span></label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
            </div>

            <div class="form-group">
                <label for="image_url">Cover Image URL</label>
                <input type="url" id="image_url" name="image_url" value="<?= htmlspecialchars($post['image_url'] ?? '') ?>">
                <small class="form-hint">Paste a new Pinterest or Unsplash direct image link</small>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" maxlength="500"><?= htmlspecialchars($post['content'] ?? '') ?></textarea>
                <div class="char-count">0 / 500</div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn-delete" onclick="confirmDelete(<?= $post['id'] ?>)">Delete Project</button>
                <div style="display: flex; gap: 12px;">
                    <button type="button" class="btn-cancel" onclick="window.location.href='index.php?page=profile'">Cancel</button>
                    <button type="submit" class="btn-publish">Save Changes</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
    function confirmDelete(postId) {
        if (confirm("Are you sure you want to delete this project? This action cannot be undone.")) {
            window.location.href = "index.php?page=delete&id=" + postId;
        }
    }
    const textarea = document.getElementById('description');
    const charCount = document.querySelector('.char-count');
    charCount.textContent = `${textarea.value.length} / 500`;
    textarea.addEventListener('input', () => {
        charCount.textContent = `${textarea.value.length} / 500`;
    });
</script>

</body>
</html>
