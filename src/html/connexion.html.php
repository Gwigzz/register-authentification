<h1 style="font-size:18px;">Connexion</h1>

<!-- Page div-->
<div class="container-page">

    <?= $messagePop->messagePop(); ?>

    <!-- Formulaire connexion -->
    <div class="container-form">
        <form action="" method="POST" class="thisForm">
            <h2>Login</h2>
            <div class="blocLabel">
                <label for="userEmail">You'r Email</label>
                <input type="email" name="userEmail" placeholder="john@email.fr" id="nameInpute" />
            </div>
            <div class="blocLabel">
                <label for="userPass">Password</label>
                <input type="password" name="userPass" placeholder="You'r password">
            </div>
            <button type="submit" name="btnValidForm">Login</button>
            <ul>
                <li><a href="/src/pages/inscription.php">Create an account</a></li>
                <li><a href="#">Forgot password</a></li>
            </ul>
        </form>


    </div>
</div>