<link rel="stylesheet" href="assets/style.css?v=<?= time(); ?>">
<header class="main-header">
    <div class="header-left">
        <span class="logo">folio<strong>.</strong></span>
        <div class="search-bar">
            <input type="text" placeholder="Search projects and creators...">
        </div>
    </div>

    <div class="header-right">
        <a href="index.php?page=home" class="nav-link active">Discover</a>

        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="index.php?page=profile" class="nav-link">Profile</a>
            <a href="index.php?page=create" class="btn-create">Nova objava</a>
            <a href="index.php?page=logout" class="btn-login">Log out</a>
        <?php else: ?>
            <a href="index.php?page=login" class="btn-login">Log in</a>
            <a href="index.php?page=register" class="btn-signup">Sign up</a>
        <?php endif; ?>
    </div>
</header>
<hr>
<main class="discover-container">
    <div class="discover-hero">
        <h1>Discover</h1>
        <p>Explore work from designers, developers, and creators worldwide.</p>
    </div>

    <div class="categories-filter">
        <button class="cat-btn active">All</button>
        <button class="cat-btn">Design</button>
        <button class="cat-btn">Development</button>
        <button class="cat-btn">Photography</button>
        <button class="cat-btn">Writing</button>
        <button class="cat-btn">Motion</button>
        <button class="cat-btn">Branding</button>
    </div>
    <div class="projects-grid">
    <?php foreach ($posts as $post): ?>
        <div class="project-card">

            <div class="card-image-wrapper">
                <img src="assets/slika.jpg" alt="<?= htmlspecialchars($post['title']) ?>" class="card-image">
            </div>

            <div class="card-content">
                <div class="card-tags">
                    <span class="tag">Design</span>
                    <span class="tag">Architecture</span>
                </div>

                <h3 class="card-title">
                    <a href="index.php?page=portfolio&id=<?= $post['id'] ?>">
                        <?= htmlspecialchars($post['title']) ?>
                    </a>
                </h3>

                <div class="card-footer">
                    <div class="author-info">
                        <div class="avatar-placeholder">
                            <?= strtoupper(substr(htmlspecialchars($post['username'] ?? 'U'), 0, 2)) ?>
                        </div>
                        <span class="author-name">Sarah Chen</span>
                    </div>
                    <div class="card-stats">
                        <span class="likes-count">❤️ 248</span>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
  </div>
</main>
