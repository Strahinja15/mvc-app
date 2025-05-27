<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
</head>

<body class="index">
    <?php include view_path('partial/home/navbar.php') ?>
    <div class="container">
        <div class="hero">
            <div class="hero-content">
                <h1>Welcome to our PHP App</h1>
                <p>Securely login and manage your account with us</p>
                <div class="hero-buttons">
                    <?php if(!is_logged_in()):?>
                    <a class="btn" href="<?php echo base_url('/login');?>">Login</a>
                    <a class="btn" href="<?php echo base_url('/register');?>">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>