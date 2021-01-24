# Shell

```sh

# display by last modifications all files and folders in current directory lign peer lign
ls -a1t

# recursive count of files on a folder
find . -type f | wc -l

# open an application from anywhere
open -a Discord

# Open the current folder in the Finder
open .

# delete a folder and all files into him
sudo rm -r .gitkraken

# see all active process
top

# Know rights on the files in the repository
ls -lah

# give every rights on the file
chmod 777 <myFile>

# download all the files & folder from an url
wpget --recursive --no-parent <url>

# create a new file
touch lol.py

# create a new folder
mkdir myNewDirectory

# trash all files in a folder
rm -rf *
# trash all files in the folder and the folder himself
rm -rf <folderName>

# copie past a file or a folder (with or without docker)
docker cp dcm2xml <dockerContainerName>:/usr/local/bin

# rename a file or folder
mv <old> <new>
# rename recursivly
find . -name '*<extension>' -exec rename -f -v 's/\<old>/\<new>/i' {} \;

# check the inet variable which contain the HOST_IP
ifconfig en0
# check the HOST_IP to see if his the same than the inet variable
env

# get result of the last command (0 = ok, 1 = failed, etc...)
echo $status

# set the same env variable in the env than in the ifconfig
set -x HOST_IP (ifconfig en0 | grep 'inet ' | cut -f 2 -d ' ')

# Know where I am
curl -sS "http://ip-api.com/json/" | jq "."

# Copy/paste content of a file in another file
cat ~/Downloads/picture.png >> ~/src/personal/cv/picture.png

# get all messages containing 'LOL' string in real time
tail -f cron.log | grep LOL
# connection to a remote server by using ssh protocol (need a private/public key)
ssh <userName>@<serverIp>

# find where is stored a command on a machine
which <commandName>

# get ssh public key
cat ~/.ssh/id_rsa.pub
# get ssh private key

# prettify an entiere project
prettier --write "**/*.js"

# create a symlink
ln <existingPathName> <newPathName>

#----- youtube-dl package -----#
youtube-dl "https://www.youtube.com/watch?v=pZ2o9a_jm-w"
# get only the audio with the best audio quality
youtube-dl -f bestaudio -x --audio-format mp3 "https://www.youtube.com/watch?v=pZ2o9a_jm-w"
# get the complete video with the best quality
youtube-dl -f best "https://www.youtube.com/watch?v=pZ2o9a_jm-w"

# Runs a benchmark for 30 seconds, using 12 threads, and keeping 400 HTTP connections open.
wrk -t12 -c400 -d30s <httpAdress>

# get running process and kill one
ps
kill -9 <pid>
lsof -i tcp:<port> # exemple for node: lsof -i tcp:3000

# vi tricks
:1,$d # remove the entiere content of a file
```
