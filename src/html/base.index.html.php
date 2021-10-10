<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=no">
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
                        <li><a class="<?php if ($activeNav == 'home') : ?>active-nav<?php endif; ?>" href="/src/pages/home.php">Home</a></li>

                        <?php if (isset($_SESSION['privateMembre'])) : ?>

                            <li><a class="<?php if ($activeNav == 'privateProfil') : ?>active-nav<?php endif; ?>" href="/src/pages/privateProfil.php">Profile</a></li>
                            <li><a class="" href="/src/scripts/disconnect.php">Disconnect</a></li>

                        <?php else : ?>

                            <li><a class="<?php if ($activeNav == 'connect') : ?>active-nav<?php endif; ?>" href="/src/pages/connexion.php">Login</a></li>
                            <li><a class="<?php if ($activeNav == 'inscription') : ?>active-nav<?php endif; ?>" href="/src/pages/inscription.php">Registration</a></li>

                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </section>
        <span class="nameSpan" id="colorSpanName"><?php if (isset($_SESSION['privateMembre'])) : ?><?= $_SESSION['privateMembre']['userName'] ?><?php endif ?></span>
    </div>
    <h1 class="h1-newsletters">_News Letters</h1>

    <!-- Content -->
    <?= $content ?>

    <!-- JS  -->
    <script src="/src/styles/js/script.js"></script>

</body>

</html>