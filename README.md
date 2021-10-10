
## Description
This project is simple, it contains a home page, a registration page and a login page.
This project is far from being optimized and efficient, you can make any type of modification to improve it.

### required before starting
* PHP >= 7.2
* phpMyAdmin >= 4.5
* MySQL >= 5.7

### Starting project
You will need to create a database with MySQL, the table file is in "src / database / local_inscription.sql", launch it from your phpMyAdmin interface.

## Main files
_____ in "src/class/"
1. ConnexionBdd.php
2. MessagePopup.php
3. ModelPdo.php
4. Redirect.php
5. RenderHtml.php
6. RequestProfilPdo.php

_____ in "src/database/"
1. getPdo.php
2. local_inscription.sql ===>
*  If you want to fast import table users, start you'r phpMyAdmin, create a DB named "local_inscription", open this, and Import from "local_inscription.sql"
3. README.txt

_____ in "src/html/"
1. base.index.html.php
2. connexion.html.php
3. home.html.php
4. inscription.html.php
5. privateProfil.html.php
6. README.txt

_____ in "src/img/"
1. tech.jpg
2. world1.jpg
3. README.txt

_____ in "src/pages/"
1. connexion.php
2. home.php
3. inscription.php
4. privateProfil.php
5. README.txt

_____ in "src/scripts/"
1. deconnexion.php
2. deleteprofil.php
3. README.txt

_____ in "src/styles/"
1. "/css/style.css"
2. "/js/" (empty)

_____ in "vendor/"
-REFERE TO => 
[getcomposer.org](https://getcomposer.org/doc/01-basic-usage.md)

