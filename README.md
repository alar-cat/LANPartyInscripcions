LAN Party Ripoll
===================
Codi utilitzat per la gestió d'usuaris (inscripcions i assistència).

### Estat del codi:
* **Inscripcions:** Estable.

### Instal·lar paquets:
* **Generar QR:** `sudo apt-get install php-gd`

### Llibreries:
Cal instal·lar les llibreries manualment. A **inscripcions/includes/libs** hi ha els dos directoris amb un **INSTALL.md** on explica com instal·lar-les.

### Paràmetres modificables:

Llista de paràmetres ordenats per fitxers que s'han d'editar en funció de cada cas.

#### inscripcions/index.php
* `Data límit:`
* `Preu:`

#### inscripcions/get_file.php
* `$secretfile`
* `$fitxer`

#### inscripcions/includes/conn.php
* `$servername`
* `$username`
* `$password`
* `$database`

#### inscripcions/includes/qr.php
* `$ruta`

#### inscripcions/includes/token.php
* `$fitxer`

#### inscripcions/includes/functions.php
* `$esdeveniment`

#### Anotacions
* A aquests canvis cal afegir-hi els que fan referència a enllaços,  altres elements concrets de la LAN Party Ripoll (una mica per tot arreu) i correus-e (`send.php`).
