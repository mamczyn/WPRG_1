<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) : ?>
            <li class="nav-item">
                <a class="nav-link" href="../doctors/specialists.php">Specjaliści</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../elements/prices.php">Cennik</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#news">Aktualności</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../elements/contact.php">Jak Dojechać</a>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Logowanie
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../users/login.php">Dla Pacjentów</a>
                    <a class="dropdown-item" href="../users/login2.php">Dla Personelu</a>
                </div>
        <?php else : ?>

            <li class="nav-item">
                <a class="nav-link" href="../doctors/specialists.php">Nasi Specjaliści</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../elements/prices.php">Cennik</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#news">Aktualności</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../elements/contact.php">Jak Dojechaćć</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="../elements/forum.php">Forum</a>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['role'])) {
                    switch ($_SESSION['role']) {
                        case 'administrator':
                            echo '<a class="dropdown-item" href="admin_panel.php">Panel Administratora</a>';
                            break;
                        case 'patient':
                            echo '<a class="dropdown-item" href="../patients/patient_panell.php">Panel Pacjenta</a>';
                            break;
                        case 'dentist':
                            echo '<a class="dropdown-item" href="dentist_panel.php">Panel Pracowników</a>';
                            break;
                    }
                }
                ?>
            </li>
        <?php endif; ?>
    </ul>
<span class="nav-item">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            echo '<a class="btn btn-light" href="../controllers/logout_controller.php">Wyloguj</a>';
        }
        ?>
    </span>
</div>



<!--    <span class="nav-item">-->
<!--        --><?php
//        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
//            $firstName = $_SESSION['first_name'] ?? 'Guest';
//            $role = $_SESSION['role'] ?? 'undefined role';
//            switch ($role) {
//                case 'administrator':
//                    $translatedRole = 'administrator';
//                    break;
//                case 'patient':
//                    $translatedRole = 'patient';
//                    break;
//                case 'dentist':
//                    $translatedRole = 'specialist';
//                    break;
//                default:
//                    $translatedRole = 'unnamed role';
//            }
//            echo "Welcome <strong>" . htmlspecialchars($firstName) . "</strong>! You're logged in as <strong>" . htmlspecialchars($translatedRole) . "</strong>.";
//        }
//        ?>
<!--    </span>-->
