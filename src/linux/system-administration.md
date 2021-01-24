# System administration

## Navigation

```sh
pwd # my current position on the system
ls # list all files in the current directory
ls - l # same but vertically displayed
ls -al # show all hidden files with it

# ENVIRONMENT
env # display the environment variables
echo $HOME # display a specific environment variable
set -x <VARIABLE> "<value>" # set a new variable

cat <filepath> # display the content of any file
date # display the date
date > save-date.txt # save the date in a file
date >> save-date.txt # append the content to the existing file
date > `date + "%Y-%m-%d"`.txt
man date # get manual of a command

# FILES
rm <file> # remove a file
mv <file> # edit a file name
mv <file> <destination> # move a file
cp <file> <destination> # copy/paste a file
touch <file> # create an empty file
vi <file> # edit the content of a file

# DIRECTORIES
mkdir <directory> # create a new directory
rmdir <directory> # remove an empty directory
rm -r <directory> # remove a directory and all his files recursivly
rm -rf * # remove all files in the current folder

# RESEARCH
grep <word> * # search the word in the files of the current directory
grep <word> */* # same but on two levels of depth
grep -r "<word>" . # search a word recursivly

find . -type f | wc -l # recursive count of files on a folder

# LINKS
ln <file> <symlink> # create a symlink

# APPLICATIONS
open -a <application> # open an application from anywhere
open . # open the current folder in the files manager
```

## Rights

```sh
w # know the current user(s) logged in
last # know the user(s) history
passwd <user> # change the password of the indicated user (only works as root)

useradd <user> # create a new user
userdel <user> # delete an existing user
userdel -r <user> # delete the user and his directory
usermod -L <user> # lock an account
usermod -U <user> # unlock an account

id <user> # get group informations about a user
ls -al /etc/skel/ # see the files a new user will have in his own repository

chmod 777 <file> # give every rights on the given file
```

## Process
```sh
top # see all active process

# get running process and kill one
ps
kill -9 <pid>
lsof -i tcp:<port> # exemple for node: lsof -i tcp:3000
```

## Network
```sh
wpget --recursive --no-parent <url> # download all the files & folder from an url

ssh <user>@<ip> # connect to a remote server by using ssh (need a private/public key)

cat ~/.ssh/id_rsa.pub # get ssh public key
```

## Tricks
```sh
# find where is stored a command on a machine
which <commandName>

# rename recursivly
find . -name '*<extension>' -exec rename -f -v 's/\<old>/\<new>/i' {} \;

# get result of the last command (0 = ok, 1 = failed, etc...)
echo $status

# check the inet variable which contain the HOST_IP
ifconfig en0
# check the HOST_IP to see if his the same than the inet variable
env
# set the same env variable in the env than in the ifconfig
set -x HOST_IP (ifconfig en0 | grep 'inet ' | cut -f 2 -d ' ')

# Know where I am
curl -sS "http://ip-api.com/json/" | jq "."

# get all the content appended to a file containing the searched value in real time
tail -f <file> | grep <value>

# Runs a benchmark for 30 seconds, using 12 threads, and keeping 400 HTTP connections open.
wrk -t12 -c400 -d30s <httpAdress>
```

### youtube-dl
```sh
youtube-dl "https://www.youtube.com/watch?v=pZ2o9a_jm-w"
# get only the audio with the best audio quality
youtube-dl -f bestaudio -x --audio-format mp3 "https://www.youtube.com/watch?v=pZ2o9a_jm-w"
# get the complete video with the best quality
youtube-dl -f best "https://www.youtube.com/watch?v=pZ2o9a_jm-w"
```

### vi
```sh
:1,$d # remove the entiere content of a file
```

### prettier
```sh
prettier --write "**/*.js" # prettify an entiere project
```
