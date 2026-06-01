<link rel="stylesheet" href="assets/style.css?v=<?= time(); ?>">
<header class="main-header">
    <div class="header-left">
        <span class="logo" onclick="window.location.href='index.php?page=home'" style="cursor:pointer;">folio<strong>.</strong></span>
        <div class="search-bar">
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="home">

                <input type="text" name="search" placeholder="Search projects and creators..."
                       value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            </form>
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
        <button class="cat-btn active" data-filter="all">All</button>
        <button class="cat-btn" data-filter="1">Design</button>
        <button class="cat-btn" data-filter="2">Development</button>
        <button class="cat-btn" data-filter="3">Photography</button>
        <button class="cat-btn" data-filter="4">Writing</button>
        <button class="cat-btn" data-filter="5">Motion</button>
        <button class="cat-btn" data-filter="6">Branding</button>
    </div>

    <div class="projects-grid">
    <?php foreach ($posts as $post): ?>
        <div class="project-card" data-category="<?= $post['category_id'] ?>">

          <div class="card-image-wrapper">
              <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'assets/slika.jpg' ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="card-image">
          </div>

            <div class="card-content">
                <div class="card-tags">
                    <span class="tag"><?= htmlspecialchars($post['category_name']) ?></span>
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
                        <span class="author-name"><?= htmlspecialchars($post['username'] ?? 'Neznan avtor') ?></span>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
    </div>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      const filterButtons = document.querySelectorAll(".cat-btn");
      const projectCards = document.querySelectorAll(".project-card");

      filterButtons.forEach(button => {
          button.addEventListener("click", function() {
              filterButtons.forEach(btn => btn.classList.remove("active"));
              this.classList.add("active");

              const filterValue = this.getAttribute("data-filter");

              projectCards.forEach(card => {
                  const cardCategory = card.getAttribute("data-category");

                  if (filterValue === "all" || filterValue === cardCategory) {
                      card.classList.remove("hidden");
                  } else {
                      card.classList.add("hidden");
                  }
              });
          });
      });
  });
</script>
