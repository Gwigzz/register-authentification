<h1>You'r profile</h1>

<div style="
margin:5px 1px 15px 10px;
color:grey;
font-size:15px;
">
    <h2>Welcome <span id="spanName"><?= $_SESSION['privateMembre']['userName'] ?></span></h2>
</div>

<ul>
    <li>Name : <strong><?= $_SESSION['privateMembre']['userName'] ?></strong></li>
    <li>Email : <strong><?= $_SESSION['privateMembre']['userEmail'] ?></strong></li>
    <li>Registered on : <strong><?= $_SESSION['privateMembre']['dateInscription'] ?></strong></li>
</ul>

<p><a href="/src/scripts/deleteProfil.php?actionDelProfil=<?= htmlspecialchars($_SESSION['privateMembre']['id']) ?>">Deleted my account</a> (Permanent deletion)</p>