LAN Party Ripoll
===================
Codi utilitzat per la gestió d'usuaris (inscripcions i assistència).

### Estat del codi:
* **Inscripcions:** Estable.
* **Lector QR:** Estable.


### Instal·lar paquets:
* **Generar QR:** `sudo apt-get install php-gd`
* **Llibreria Tkinter:** `sudo apt-get install python3-tk`
* **Fswebcam:** `sudo apt-get install fswebcam`
* **Zbar-tools:** `sudo apt-get install zbar-tools`

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
* `$esdeveniment`
* `$clau`
* `$ruta`

#### inscripcions/includes/token.php
* `$fitxer`

#### lector/includes/lector.py
* `password`

#### Anotacions
* La `$clau` del fitxer `qr.php` ha de ser la mateixa que el `password` del fitxer `lector.py`.
* A aquests canvis cal afegir-hi els que fan referència a enllaços,  altres elements concrets de la LAN Party Ripoll (una mica per tot arreu) i correus-e (`send.php`).
