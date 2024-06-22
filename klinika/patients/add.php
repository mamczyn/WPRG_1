<?php include('../includes/header.php'); ?>
<main class="container">
    <h1 class="mt-4">Dodaj Pacjenta</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Imię:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko:</label>
            <input type="text" class="form-control" name="surname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefon:</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Adres:</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj Pacjenta</button>
    </form>
</main>
<?php include('../includes/footer.php'); ?>
