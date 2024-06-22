<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="/index.php">Strona Główna</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/clinic/info.php">O Przychodni</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/clinic/services.php">Usługi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/clinic/prices.php">Cennik</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/clinic/location.php">Lokalizacja</a>
    </li>
    <?php if (isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
            <a class="nav-link" href="/patients/list.php">Pacjenci</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/doctors/list.php">Lekarze</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/appointments/list.php">Wizyty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/medical_records/list.php">Dokumentacja Medyczna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/forum/index.php">Forum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users/logout.php">Wyloguj</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="/users/login.php">Logowanie</a>
        </li>
    <?php endif; ?>
</ul>
