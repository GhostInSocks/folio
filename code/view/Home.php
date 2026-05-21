<nav>
    <a href="index.php?page=home">Domov</a> |

    <?php if (isset($_SESSION['user_id'])): ?>
        <span>Živijo, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</span> |
        <a href="index.php?page=create">Nova objava</a> |
        <a href="index.php?page=logout">Odjava</a>
    <?php else: ?>
        <a href="index.php?page=login">Prijava</a> |
        <a href="index.php?page=register">Registracija</a>
    <?php endif; ?>
</nav>
<hr>

<h1>Odkrijte projekte</h1>
<div class="gallery">
    <?php foreach ($posts as $post): ?>
        <div class="card">
            <img src="assets/slika.jpg" alt="Projekt"> <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p><?= htmlspecialchars($post['content']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
