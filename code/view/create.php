<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>New Project - folio.</title>
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
        <a href="index.php?page=profile" class="nav-link">Profile</a>
        <a href="index.php?page=logout" class="btn-login">Log out</a>
    </div>
</header>

<div class="create-fullscreen-wrapper">
    <div class="create-card-container">

        <div class="create-header">
            <h2>New Project</h2>
            <p>Add a project to your portfolio</p>
        </div>

        <form action="index.php?page=create" method="POST" class="create-form">

            <div class="form-group">
                <label for="title">Project Name <span class="required">*</span></label>
                <input type="text" id="title" name="title" placeholder="e.g. Brand Identity for Fern" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category <span class="required">*</span></label>
                <select id="category_id" name="category_id" required class="form-select">
                    <option value="1">Design</option>
                    <option value="2">Development</option>
                    <option value="3">Photography</option>
                    <option value="4">Motion</option>
                    <option value="5">Writing</option>
                    <option value="6">Branding</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image_url">Cover Image URL</label>
                <input type="url" id="image_url" name="image_url" placeholder="https://example.com/image.jpg">
                <small class="form-hint">Paste a direct link to an image from the web (Unsplash, Pinterest, etc.)</small>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" maxlength="500" placeholder="Describe your project — what it is, how it was made, what you were exploring..."></textarea>
                <div class="char-count">0 / 500</div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn-cancel" onclick="window.location.href='index.php?page=home'">Cancel</button>
                <button type="submit" class="btn-publish">Publish Project</button>
            </div>

        </form>
    </div>
</div>

<script>
    const textarea = document.getElementById('description');
    const charCount = document.querySelector('.char-count');

    textarea.addEventListener('input', () => {
        charCount.textContent = `${textarea.value.length} / 500`;
    });
</script>

</body>
</html>
