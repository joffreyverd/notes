# Rights handling

```sh

# install `sudo`package to handle rights
apt update && apt install sudo

# create a new user
adduser <userName>

# add a new user to the sudo group
sudo usermod -a -G sudo <userName>

# connection in the term as the user to add to the sudo group
su - <userName>
# check if `sudo`is displayed in the return of the following function
groups

# add the current user to the `input` group
sudo gpasswd -a $USER input
```
