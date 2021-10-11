# Nextcloud

Delete nextcloud motd:

```sh
rm /etc/update-motd.d/70-nextcloud
```

Update && upgrade:

```sh
apt-get update && apt-get upgrade
```

Debug updater if it stucks:

```sh
rm /var/www/html/nextcloud/data/updater-[INSTANCE_ID]/.step
```

Increase the PHP memory limit:

```sh
vi /etc/php/7.4/apache2/php.ini
memory_limit = 512M
service apache2 restart
```

Update config:

```sh
vi /var/www/html/nextcloud/config/config.php
```

```php
  'trusted_domains' =>
  array (
    0 => '163.172.152.10',
    1 => 'joffreyverd.fr',
  ),
  'default_phone_region' => 'FR',
```

Generate missing indices in db:

```sh
cd /var/www/html/nextcloud
sudo -u www-data php occ db:add-missing-indices
```

Generate missing primary keys in db:

```sh
cd /var/www/html/nextcloud
sudo -u www-data php occ db:add-missing-primary-keys
```

Generate missing columns in db:

```sh
cd /var/www/html/nextcloud
sudo -u www-data php occ db:add-missing-columns
```

Generate bigInt converstion database columns:

```sh
cd /var/www/html/nextcloud
sudo -u www-data php occ db:convert-filecache-bigint
```

Installing missing packages:

```sh
apt install php-bcmath
apt install php-gmp
service apache2 restart
```

Installing imagick last version:

```sh
apt-get install libmagickcore-6.q16-6-extra
```

Rewrite url, removing `index.php` from url:

```sh
vi /var/www/html/nextcloud/config/config.php
'htaccess.RewriteBase' => '/nextcloud',
cd /var/www/html/nextcloud
sudo -u www-data php occ maintenance:update:htaccess
```

Generate ssl certificate:

```sh
certbot --register-unsafely-without-email --apache -m joffreyverd.fr
certbot --apache -m jverd@protonmail.com -d joffreyverd.fr
```
