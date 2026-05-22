<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($_SESSION['username']) ?> - Profile</title>
    <link class="style-sheet" rel="stylesheet" href="assets/style.css?v=<?= time(); ?>">
    <link class="style-sheet" rel="stylesheet" href="assets/profile.css?v=<?= time(); ?>">
</head>
<body>

<header class="main-header">
    <div class="header-left">
        <span class="logo" onclick="window.location.href='index.php?page=home'" style="cursor:pointer;">folio<strong>.</strong></span>
        <div class="search-bar">
            <input type="text" placeholder="Search projects and creators...">
        </div>
    </div>
    <div class="header-right">
        <a href="index.php?page=home" class="nav-link">Discover</a>
        <a href="index.php?page=profile" class="nav-link active">Profile</a>
        <a href="index.php?page=create" class="btn-create">Nova objava</a>
        <a href="index.php?page=logout" class="btn-login">Log out</a>
    </div>
</header>

<main class="profile-container">
    <a href="index.php?page=home" class="profile-back">← Discover</a>

    <section class="profile-hero">
        <div class="profile-avatar-wrapper">
            <div class="profile-avatar-placeholder">
                <?= strtoupper(substr(htmlspecialchars($_SESSION['username']), 0, 2)) ?>
            </div>
        </div>

        <div class="profile-info">
            <div class="profile-name-row">
                <h2><?= htmlspecialchars($_SESSION['username']) ?></h2>
            </div>
            <p class="profile-headline">Folio Creator / Developer</p>
        </div>
    </section>

    <section class="profile-bio">
        <p>Designing at the intersection of systems thinking and visual craft. I care deeply about typography, spatial reasoning, and the quiet logic of well-structured interfaces.</p>
    </section>

    <section class="profile-stats">
        <div class="stat-item"><strong><?= count($userPosts) ?></strong> Projects</div>
    </section>

    <hr class="profile-divider">

    <section class="profile-work">
        <h3 class="section-title">Featured Work</h3>

        <div class="projects-grid">
            <?php if (empty($userPosts)): ?>
                <p class="no-posts">Še nimaš nobene objave. Klikni "Nova objava" zgoraj!</p>
            <?php else: ?>
                <?php foreach ($userPosts as $post): ?>
                    <div class="project-card">
                      <div class="card-image-wrapper">
                          <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'assets/slika.jpg' ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="card-image">
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
                                    <span class="author-name">by <?= htmlspecialchars($post['username']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

</body>
</html>
