<h1 style="font-size:18px;">Inscription</h1>
<!-- Page div-->
<div class="container-page">

    <!-- Formulaire inscription -->
    <div class="container-form">
        <form action="" method="POST" class="thisForm">
            <h2>S'inscrire</h2>
            <div class="blocLabel">
                <label for="userName">Pseudo ou Prénom</label>
                <input type="text" name="userName" placeholder="Prénom ou pseudo" id="nameInpute" />
            </div>
            <div class="blocLabel">
                <label for="userEmail">Votre email</label>
                <input type="email" name="userEmail" placeholder="email@mail.fr" />
            </div>
            <div class="blocLabel">
                <label for="userPass">Password</label>
                <input type="password" name="userPass" placeholder="Votre mot de passe" />
                <label for="userRepeatPass">Repeat password</label>
                <input type="password" name="userRepeatPass" placeholder="Le même mot de passe" />
                <button type="submit" name="btnValidForm">S'inscrire</button>
            </div>
            <ul>
                <li><a href="/src/pages/connexion.php">Se connecter</a></li>
            </ul>

        </form>
    </div>

</div><!-- End page div-->