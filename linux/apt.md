```sh

# list all installed packages on the machine
apt list --installed

# check if a specific package is installed or not
apt list --installed | grep <packageName>

# install a package
apt-get install <packageName>

# uninstall a package with his associated configuration files
apt-get --purge remove <packageName>

# delete a package
apt-get --purge remove <packageName>

# delete a package with all his dependencies
apt-get --purge autoremove <packageName>

# get the installed packages list
dpkg --list

# install the downloaded `.deb` executable
gdebi <packageFile>
