<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Log in - folio.</title>
    <link rel="stylesheet" href="assets/auth.css">
</head>
<body>

<div class="auth-wrapper">
    <a href="index.php?page=home" class="btn-back">
        <span class="arrow">←</span> Back
    </a>

    <div class="auth-container">
        <div class="auth-logo-text">folio<strong>.</strong></div>

        <h2>Welcome back!</h2>
        <p class="auth-subtitle">First time here? <a href="index.php?page=register">Sign up for free</a></p>

        <form action="index.php?page=login" method="POST" class="auth-form">
            <div class="input-group">
                <input type="text" name="username" placeholder="Your username" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-submit">Sign in</button>
        </form>
    </div>
</div>

</body>
</html>
