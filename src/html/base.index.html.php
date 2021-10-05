<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/src/styles/css/style.css" />
    <title><?php if (isset($title)) : ?><?= $title ?><?php else : ?><?= "No title"; ?><?php endif ?></title>
</head>

<body>

    <div class="container-nav-section">
        <section>
            <div class="nav-container">
                <nav>
                    <ul>
                        <li><a class="<?php if ($activeNav == 'home') : ?>active-nav<?php endif; ?>" href="/src/pages/home.php">Acceuil</a></li>

                        <?php if (isset($_SESSION['privateMembre'])) : ?>

                            <li><a class="<?php if ($activeNav == 'privateProfil') : ?>active-nav<?php endif; ?>" href="/src/pages/privateProfil.php">Mon profil</a></li>
                            <li><a class="" href="/src/scripts/deconnexion.php">Deconnexion</a></li>

                        <?php else : ?>

                            <li><a class="<?php if ($activeNav == 'connect') : ?>active-nav<?php endif; ?>" href="/src/pages/connexion.php">Connexion</a></li>
                            <li><a class="<?php if ($activeNav == 'inscription') : ?>active-nav<?php endif; ?>" href="/src/pages/inscription.php">Inscription</a></li>

                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </section>
    </div>
    <h1 class="h1-newsletters">_News Letters</h1>

    <!-- Content -->
    <?= $content ?>



    <!-- JS focus form inscription -->
    <script>
        window.onload = function() {
            let focusInput = document.getElementById("nameInpute").focus();
        }
    </script>

</body>

</html>