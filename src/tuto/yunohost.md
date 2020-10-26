# OVH VPS configuration with YunoHost service

## First steps

1. Connection as debian user
```sh
ssh debian@<IPv4>
```

2. Create a new user
```sh
adduser <userName>
```

3. Add the new user to the sudo group
```sh
sudo usermod -a -G sudo <userName>
```

4. Switch in root mode
```sh
su - root
```

5. Run the YunoHost installation as root
```sh
curl https://install.yunohost.org | bash
```

## Preview generator on nextcloud

1. Install the Preview Generator App from Nextcloud

2. Update the server
```sh
apt upgrade && apt -y update
```

3. Add preview providers
```sh
vi /var/www/nextcloud/config/config.php
```
```php
'preview_libreoffice_path' => '/usr/bin/libreoffice',
'enable_previews' => true,
'enabledPreviewProviders' =>
[
    0 => 'OC\\Preview\\TXT',
    1 => 'OC\\Preview\\MarkDown',
    2 => 'OC\\Preview\\OpenDocument',
    3 => 'OC\\Preview\\PDF',
    4 => 'OC\\Preview\\MSOffice2003',
    5 => 'OC\\Preview\\MSOfficeDoc',
    6 => 'OC\\Preview\\PDF',
    7 => 'OC\\Preview\\Image',
    8 => 'OC\\Preview\\Photoshop',
    9 => 'OC\\Preview\\TIFF',
    10 => 'OC\\Preview\\SVG',
    11 => 'OC\\Preview\\Font',
    12 => 'OC\\Preview\\MP3',
    13 => 'OC\\Preview\\Movie',
    14 => 'OC\\Preview\\MKV',
    15 => 'OC\\Preview\\MP4',
    16 => 'OC\\Preview\\AVI',
],
```

4. Execute the first run
```sh
sudo -u nextcloud php /var/www/nextcloud/occ preview:generate-all -vvv
```

5. Add a cronjob
```sh
crontab -u nextcloud -e
# then copy/past the following
*/10 * * * * php /var/www/nextcloud/occ preview:pre-generate -vvv
```

### Optional
```sh
apt install libreoffice libreoffice-l10n-de libreoffice-help-de
apt install ffmpeg imagemagick ghostscript
```

## Backup with Borg
