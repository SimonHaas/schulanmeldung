# Schulanmeldung

## Install project

1. Projekt auf klonen https://git-scm.com: `git clone https://github.com/SimonHaas/schulanmeldung.git`
2. `cd schulanmeldung`
3. PHP-Fremdbibliotheken installieren mit Hilfe von https://getcomposer.org `composer install`
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
4. `php bin/console doctrine:database:create`
    * Das legt die in der .env Datei konfigurierte Datenbank an.
5. `php bin/console migrate`
    * Das führt die unter `src/Migrations` liegenden Datenbank-Migrationen aus um die Tabellen zu erstellen.
6. Im Browser `/user`aufrufen. 
    * Das legt einen neuen Admin-Account mit den Zugangsdaten aus der .env Datei an.
    
    
## Datenmigration
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
              


