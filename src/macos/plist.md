# Plist

## Introduction

launchd It is a very powerful launcher system and the standard launcher system for Mac OS.
Every service/task is a file. The location of the file depends on the questions :
- When is this service supposed to run?
- Which privileges will the service need?

Running tasks whith or whitout a logged in user: */Library/LaunchDaemons*:
Executed with "root" privileges.

Running tasks with a logged in user:  */Library/LaunchAgents*:
Executed with the privileges of the connected user.

Running tasks with me as user and not other user: *~/Library/LaunchAgents*: Executed with the privileges of the connected user.

## Exemple

For every **launchd** task there is a file in plist (.plist) format.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple Computer//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
    <dict>
        <key>Label</key>
        <string>com.personal.test</string>
        <key>KeepAlive</key>
        <true/>
        <key>ProgramArguments</key>
        <array>
            <string>/bin/sh ~/Desktop/test.sh</string>
        </array>
        <key>RunAtLoad</key>
        <true/>
        <key>StartInterval</key>
        <integer>60</integer>
    </dict>
</plist>
```

## Commands

```sh
# to manually load the plist
launchctl load <labelValue>

# to manually unload the plist
launchctl unload <labelValue>

# get a list of agents
launchctl list

# get informations about a specific agent
launchctl list | grep <labelValue>

# start the agent
launchctl start <labelValue>

# stop the agent
launchctl stop <labelValue>

# use linter on a plist to be sure it is understandable
plutil -lint <labelValue>
```
