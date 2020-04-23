# Schulanmeldung

## Install project

1. Projekt klonen https://git-scm.com: `git clone https://github.com/SimonHaas/schulanmeldung.git`
2. `cd schulanmeldung`
4. .env.dist nach .env kopieren: `cp .env.dist .env`
3. .env Datei bearbeiten:
	* APP_ENV=prod
	* DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
		- Die Datenbank muss zu diesem Zeitpunkt noch nicht angelegt sein!
	* EINTRITTSDATUM_ERSTE_HAELFTE=2019-09-10
	 	- Bei Anmeldungen vor diesem Datum wird das als Eintrittsdatum gespeichert, bei Anmeldungen danach das folgende:
	* EINTRITTSDATUM_ZWEITE_HAELFTE=2020-09-11
	* ADMIN_EMAIL=admin@test.de
	* ADMIN_PASSWORD=1234
		- Mit diesen Daten kann ein neuer Admin-Account erstellt werden. Einfach Schritt 8 ausführen und es wird ein neuer User in der Datenbank angelegt. Dann können diese zwei Variablen theoretischer Weise wieder gelöscht werden.
		- Den Adminbereich erreicht man über `/admin`.
4. docker-compose.yml.dist nach docker-compose.yml kopieren: `cp docker-compose.yml.dist docker-compose.yml`
5. Datenbank-Zugangsdaten in der docker-compose.yml anpassen
5. Anwendung starten `sudo docker-compose up -d`
5. Terminal im php-container öffnen `sudo docker-compose exec php /bin/bash`
3. PHP-Fremdbibliotheken installieren mit Hilfe von https://getcomposer.org `composer install`
4. Datenbank anlegen `php bin/console doctrine:database:create`
    * Das legt die in der .env Datei konfigurierte Datenbank an.
5. Migrationen ausführen `php bin/console doctrine:migrations:migrate`
    * Das führt die unter `src/Migrations` liegenden Datenbank-Migrationen aus um die Tabellen zu erstellen.
6. In der PHP-ini muss die Extension `intl` aktiviert sein um die richtigen Länder bei der Auswahl des Herkunftslandes anzeigen zu können.
6. Im Browser `/user`aufrufen. 
    * Das legt einen neuen  Admin-Account mit den Zugangsdaten aus der .env Datei an.
    
    
## Datenmigration

In den JSON-Export dürfen keine Kommentare sein. In der Ersten Zeile muss es gleich mit dem Inhalt losgehen. 

### Berufe
1. Tabelle `berufekennungen` im Format `JSON` exportieren.
2. Datei `berufekennungen.json` in das Root-Verzeichnis der Schulanmeldung legen.
3. `/migration/berufe` im Browser aufrufen

### Berufe
1. Tabelle `betriebedaten` im Format `JSON` exportieren.
2. Datei `betriebedaten.json` in das Root-Verzeichnis der Schulanmeldung legen.
3. `/migration/betriebe` im Browser aufrufen

### Schulen
1. Tabelle `herkunftsschulen` im Format `JSON` exportieren.
2. Datei `herkunftsschulen.json` in das Root-Verzeichnis der Schulanmeldung legen.
3. `/migration/schulen` im Browser aufrufen.

## Apache virtual host config

```
<VirtualHost *>
   DocumentRoot "<Projekt-Verzeichnis>/public"
   ServerName <URL>
   DirectoryIndex index.php
   <Directory "<Projekt-Verzeichnis>/public">
     AllowOverride All
     Allow from All
 	
 	<IfModule mod_rewrite.c>
         Options -MultiViews
         RewriteEngine On
         RewriteCond %{REQUEST_FILENAME} !-f
         RewriteRule ^(.*)$ index.php [QSA,L]
     </IfModule>
   </Directory>
</VirtualHost>
```
Es empfiehlt sich die Schulanmeldung unter einer Subdomain zu installieren.
              


