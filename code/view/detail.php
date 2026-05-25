<link rel="stylesheet" href="assets/style.css?v=<?= time(); ?>">
<link rel="stylesheet" href="assets/detail.css?v=<?= time(); ?>">
<header class="main-header">
    <div class="header-left">
        <span class="logo" onclick="window.location.href='index.php?page=home'" style="cursor:pointer;">folio<strong>.</strong></span>
        <div class="search-bar">
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="home">
                <input type="text" name="search" placeholder="Search projects and creators..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            </form>
        </div>
    </div>
    <div class="header-right">
        <a href="index.php?page=home" class="nav-link">Discover</a>
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

<div class="detail-hero" style="background-image: url('<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'assets/slika.jpg' ?>');">
    <div class="detail-hero-overlay"></div>
</div>

<main class="detail-container">
    <a href="index.php?page=home" class="back-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          Back to Discover
    </a>

    <div class="detail-header-meta">
        <h1 class="detail-title"><?= htmlspecialchars($post['title']) ?></h1>

        <div class="detail-tags">
            <span class="tag"><?= htmlspecialchars($post['category_name'] ?? 'Design') ?></span>
        </div>

        <div class="detail-author">
            <div class="avatar-placeholder">
                <?= strtoupper(substr(htmlspecialchars($post['username'] ?? 'U'), 0, 2)) ?>
            </div>
            <span class="author-name">by <strong><?= htmlspecialchars($post['username'] ?? 'Neznan avtor') ?></strong></span>
        </div>
    </div>

    <hr class="detail-divider">

    <div class="detail-description">
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </div>

</main>
