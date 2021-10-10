
##### Description #####

this project is far from being optimized and efficient.
It contains, a home page, a registration and login page, you will need to create a database with mysql. the table file is in "src / database / local_inscription.sql", launch it from your phpMyAdmin interface.



// Main files =>

_____ in "src/class/", includes :
1. ConnexionBdd.php
2. MessagePopup.php
3. ModelPdo.php
4. Redirect.php
5. RenderHtml.php
6. RequestProfilPdo.php

_____ in "src/database/", includes :
1. getPdo.php
2. local_inscription.sql ===>
*  If you want to fast import table users, start you'r phpMyAdmin, create a DB named "local_inscription", open this, and Import from "local_inscription.sql"
3. README.txt

_____ in "src/html/", includes :
1. base.index.html.php
2. connexion.html.php
3. home.html.php
4. inscription.html.php
5. privateProfil.html.php
6. README.txt

_____ in "src/img/", includes :
1. tech.jpg
2. world1.jpg
3. README.txt

_____ in "src/pages/", includes :
1. connexion.php
2. home.php
3. inscription.php
4. privateProfil.php
5. README.txt

_____ in "src/scripts/", includes :
1. deconnexion.php
2. deleteprofil.php
3. README.txt

_____ in "src/styles/", includes :
1. "/css/style.css"
2. "/js/" (empty)

_____ in "vendor/", includes :
-REFERE TO => [getcomposer.org] (https://getcomposer.org/doc/01-basic-usage.md)

