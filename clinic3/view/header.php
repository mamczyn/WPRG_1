<!DOCTYPE html>
<html>
<head>
    <title>Poradnia Lekarska u Mamczyna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    .navbar-brand img;

    .navbar;

    .navbar-collapse;
</style>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/images/moje_logo.png" alt="Logo Przychodni" style="max-height: 50px; margin-right: 10px; border-radius: 50%;">
                <span>Przychodnia Lekarska u Mamczyna</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php include('nav.php');?>
            </div>
        </div>
    </nav>
</header>
