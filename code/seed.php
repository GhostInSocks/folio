<?php
require_once 'model/DBInit.php';

try {
    $db = DBInit::getInstance();

    // 1. KATEGORIJA: Preverimo, če obstaja kategorija "Design", sicer jo ustvarimo
    $stmt = $db->prepare("SELECT id FROM categories WHERE name = 'Design' LIMIT 1");
    $stmt->execute();
    $category = $stmt->fetch();

    if (!$category) {
        // Če tvoja tabela uporablja stolpec 'title' namesto 'name', spodaj popravi v ':title'
        $insertCat = $db->prepare("INSERT INTO categories (name) VALUES ('Design')");
        $insertCat->execute();
        $categoryId = $db->lastInsertId();
    } else {
        $categoryId = $category['id'];
    }


    // 2. USTVARJANJE TESTNIH UPORABNIKOV
    $users = [
        ['username' => 'James Park', 'password' => password_hash('geslo123', PASSWORD_DEFAULT)],
        ['username' => 'Yuki Tanaka', 'password' => password_hash('geslo123', PASSWORD_DEFAULT)],
        ['username' => 'Cora Mills', 'password' => password_hash('geslo123', PASSWORD_DEFAULT)]
    ];

    $userIds = [];

    foreach ($users as $u) {
        $stmt = $db->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute(['username' => $u['username']]);
        $existing = $stmt->fetch();

        if (!$existing) {
            $insertUser = $db->prepare("INSERT INTO users (username, password, bio) VALUES (:username, :password, '')");
            $insertUser->execute(['username' => $u['username'], 'password' => $u['password']]);
            $userIds[$u['username']] = $db->lastInsertId();
        } else {
            $userIds[$u['username']] = $existing['id'];
        }
    }


    // 3. USTVARJANJE PROJEKTOV (z dodanim category_id)
    $projects = [
        [
            'user_id' => $userIds['James Park'],
            'title' => 'Tokyo Grid System',
            'category_id' => $categoryId
        ],
        [
            'user_id' => $userIds['Yuki Tanaka'],
            'title' => 'Concrete Series III',
            'category_id' => $categoryId
        ],
        [
            'user_id' => $userIds['Cora Mills'],
            'title' => 'The Quiet Season',
            'category_id' => $categoryId
        ]
    ];

    foreach ($projects as $p) {
        $stmt = $db->prepare("SELECT id FROM cards WHERE title = :title AND user_id = :user_id");
        $stmt->execute(['title' => $p['title'], 'user_id' => $p['user_id']]);

        if (!$stmt->fetch()) {
            // Tukaj smo zdaj dodali še vstavljanje category_id
            $insertProject = $db->prepare("INSERT INTO cards (user_id, title, category_id) VALUES (:user_id, :title, :category_id)");
            $insertProject->execute([
                'user_id' => $p['user_id'],
                'title' => $p['title'],
                'category_id' => $p['category_id']
            ]);
        }
    }

    echo "<h2 style='color: green; font-family: sans-serif;'>Uporabniki in projekti uspešno dodani z upoštevanjem kategorij!</h2>";
    echo "<p><a href='index.php?page=home'>Pojdi na domačo stran</a></p>";

} catch (Exception $e) {
    echo "<h2 style='color: red;'>Napaka pri polnjenju baze: " . $e->getMessage() . "</h2>";
}
?>
