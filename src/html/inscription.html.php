<h1 style="font-size:18px;">Authentification</h1>

<?= $messagePop->messagePop(); ?>

<!-- Page div-->
<div class="container-page">

    <!-- Formulaire inscription -->
    <div class="container-form">
        <form action="" method="POST" class="thisForm">
            <h2>Register</h2>
            <div class="blocLabel">
                <label for="userName">Pseudo or name</label>
                <input type="text" name="userName" placeholder="Pseudo or name" id="nameInpute" />
            </div>
            <div class="blocLabel">
                <label for="userEmail">You'r Email</label>
                <input type="email" name="userEmail" placeholder="email@mail.fr" />
            </div>
            <div class="blocLabel">
                <label for="userPass">Password</label>
                <input type="password" name="userPass" placeholder="You'r password" />
                <label for="userRepeatPass">Repeat password</label>
                <input type="password" name="userRepeatPass" placeholder="Repeat password" />
                <button type="submit" name="btnValidForm">Register</button>
            </div>
            <ul>
                <li><a href="/src/pages/connexion.php">Login</a></li>
            </ul>

        </form>
    </div>

</div><!-- End page div-->