# Node/PM2 installation on a Scaleway VPS

1. Install updates and validate
```sh
apt update -y
```

2. Download last version of node server
```sh
curl -sL https://deb.nodesource.com/setup_10.x | bash -
```

3. Install nodejs and validate
```sh
apt install nodejs -y
```

4. Install globally pm2
```sh
npm install pm2 -g
```

5. Change the motd
```sh
# see message of the day
cat /etc/update-motd.d/50-scw
# change asci art as message of the day
vi /etc/motd.head
```
