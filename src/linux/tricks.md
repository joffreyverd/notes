# Tricks

- Change the default shell text editor

```sh
sudo update-alternatives --config editor
# ten choose an id to change the priority and press "enter"
```

- If the Linux distro freez on shutdown/restart/logout, try this

```sh
# edit the grub file
sudo vi /etc/default/grub
# then change the following value...
GRUB_CMDLINE_LINUX_DEFAULT="quiet splash"
# ...by this one
GRUB_CMDLINE_LINUX_DEFAULT="quiet splash acpi=force"
# then update grub
sudo update-grub
# reduce the tiemout on start and stop
sudo -H gedit /etc/systemd/system.conf
# uncomment these lines and change the timeout to 5 seconds
DefaultTimeoutStartSec=5s
DefaultTimeoutStopSec=5s
# reload the daemon
sudo systemctl daemon-reload
```

- Create an alias with the fish shell

```sh
alias k="kubectl"
funcsave k
```
