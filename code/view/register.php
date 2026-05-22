<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Sign up - folio.</title>
    <link rel="stylesheet" href="assets/auth.css?v=<?= time(); ?>">
</head>
<body>

<div class="auth-wrapper">
    <a href="index.php?page=home" class="btn-back">
        <span class="arrow">←</span> Back
    </a>

    <div class="auth-container">
        <div class="auth-logo-text">folio<strong>.</strong></div>

        <h2>Join the community!</h2>
        <p class="auth-subtitle">Already have an account? <a href="index.php?page=login">Sign in here</a></p>

        <form action="index.php?page=register" method="POST" class="auth-form">
            <div class="input-group">
                <input type="text" name="username" placeholder="Choose a username" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Create a password" required>
            </div>

            <button type="submit" class="btn-submit">Sign up</button>
        </form>
    </div>
</div>

</body>
</html>
