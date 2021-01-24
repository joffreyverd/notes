# apt

```sh

apt search <package>

apt update # update the sources list

apt upgrade # upgrade the packages

apt list --installed

apt list --installed | grep <package>

apt list --upgradable

apt install <package>

apt show <package> # get informations

apt remove <package>

apt purge <package> # uninstall package with config files

apt autoremove # remove unused dependencies

apt autoclean # remove outdated package debian files

apt clean # clean apt cache

# get the installed packages list
dpkg --list

# install the downloaded `.deb` executable
gdebi <packageFile>
```
