# Create a cron

**edit the crontab**
```sh
sudo crontab -e
```

**Explaination**
```sh
* * * * *  command
│ │ │ │ │
│ │ │ │ └─── day of week (0 - 6) (0 to 6 are Sunday to Saturday, or use names; 7 is Sunday, the same as 0)
│ │ │ └──────── month (1 - 12)
│ │ └───────────── day of month (1 - 31)
│ └────────────────── hour (0 - 23)
└─────────────────────── min (0 - 59)
```

**List the crontab jobs**
```sh
crontab -l
```

**Cron exemples**
```sh
# send a mail in case of error to the following adress
MAILTO=jverd@protonmail.com

# execute a script every minute
* * * * * sh ./Desktop/test.sh

# register logs from command or action
* * * * * echo 'Hello there' >> ./Desktop/log.txt
```

**Restart a cron as root**
```sh
sudo cron restart
```
**Remove crontab**
```sh
# /!\ IT WILL DELETE ALL THE TASKS
crontab -r
```
