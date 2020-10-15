# OVH VPS configuration with YunoHost service

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
