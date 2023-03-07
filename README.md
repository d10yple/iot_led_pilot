# installation setup apache-php-python-mysql

### étapes

1) Installer tout les paquets et les dépendances

2) Clonage du repo git dans /var/www/html

2) Configurer la base de donnée

4) Configuration de [php.in](http://php.in)i

### Installation de tout les paquets

- apt-get update -y && apt-get upgrade -y && apt-get install git-all apache2 mariadb-server php php-mysql python3 python3-pip  -y
    - python3-pip → pour installer le gestionnaire de dépendances python
        - mysql-connector-python → pour utiliser mysql dans notre code python

### Clonage du repo git dans /var/www/html

- git clone [https://github.com/d10yple/iot_led_pilot](https://github.com/d10yple/iot_led_pilot).git /var/www/html/
    - dans le fichier python/script.py → veiller à bien modifier les logs
    - dans le fichier php/post_script.php → veiller à bien modifier les logs également

### Configuration de la base de donnée MariaDB

- mariadb
- GRANT ALL ON *.* TO 'username'@'localhost' IDENTIFIED BY 'password' WITH GRANT OPTION;
- FLUSH PRIVILEGES;
- exit;
- mariadb
- create database iot_led_pilot;
- use iot_led_pilot;
- source database.sql

### Configuration de PHP et du module PDO

- php -m  | grep pdo
    - → vérifier si le module PDO est bien installé
- php —ini
    - → trouver le fichier de configuration de PHP (php.ini)
- nano php.ini
- trouver `extension=pdo_mysql` et retirer le point virgule
- systemctl restart apache2
