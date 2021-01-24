# Connectivity

## Bluetooth network

- Looking for connected devices
```sh
hcitool dev
```

- Looking for ready-to-pair devices
```sh
hcitool scan
```

## Network setup

- Identify network controller
```sh
lspci -nnd ::0280
```

- Check if the network controller is handled by the kernel
```sh
lspci -nnkd ::0280
```

- Check the firmware existence
```sh
ip a
```

- If `wlp<xxx>` is not dispay by the previous result, install the missing firmware is needed. Find with the following command the missing firmware
```sh
dmesg | grep firmware
```

- Enable the `non-free` firmwares downloads in /etc/apt/sources.list
```sh
nano /etc/apt/sources.list
# then add the `contrib non-free`tag to the two first lines of the file
deb http://deb.debian.org/debian stretch main contrib non-free
deb-src http://deb.debian.org/debian stretch main contrib non-free

deb http://security.debian.org/debian-security/ stretch/updates main
deb-src http://security.debian.org/debian-security/ stretch/updates main

deb http://deb.debian.org/debian stretch-updates main
deb-src http://deb.debian.org/debian stretch-updates main
```

- The `apt-cache` default command doesn't retrieve always the missing firmwars so it's safer to use `apt-file`
```sh
apt install apt-file
apt-file update
```

- Search again the missing firemwares, then get the result. Do it for each missing firmwares
```sh
# exemple:
apt-file find iwlwifi-8265-22.ucode
# return:
firmware-iwlwifi: /lib/firmware/iwlwifi-8265-22.ucode
# installation:
apt install firmware-iwlwifi
```

- It's the network controller driver which instantiate the network interface so it's needed to the targeted driver
```sh
modprobe -rv iwlwifi && modprobe -v iwlwifi
```

- Or directly install the missing non free firmware (easiest way)
```sh
apt install firmware-linux-nonfree
```

- A reboot can be necessary to update changes on the network controller
