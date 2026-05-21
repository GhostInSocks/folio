<h1>Odkrijte projekte</h1>
<div class="gallery">
    <?php foreach ($posts as $post): ?>
        <div class="card">
            <img src="slika.jpg" alt="Projekt"> <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p><?= htmlspecialchars($post['content']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
