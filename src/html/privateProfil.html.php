<h1>Votre profil</h1>

<div style="
margin:5px 1px 15px 10px;
color:grey;
font-size:15px;
">
    <h2>Bonjour <span id="spanName"><?= $_SESSION['privateMembre']['userName'] ?></span></h2>
</div>

<ul>
    <li>Prénom : <strong><?= $_SESSION['privateMembre']['userName'] ?></strong></li>
    <li>Email : <strong><?= $_SESSION['privateMembre']['userEmail'] ?></strong></li>
    <li>Inscrit le : <strong><?= $_SESSION['privateMembre']['dateInscription'] ?></strong></li>
</ul>

<p><a href="/src/scripts/deleteprofil.php?actionDelProfil=<?= htmlspecialchars($_SESSION['privateMembre']['id']) ?>">Supprimer mon profil</a> (Suppréssion définitive)</p>