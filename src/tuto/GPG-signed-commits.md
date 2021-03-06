# Set up GPG signed commits on GitHub

1. Install gpg-suite and keybase
```sh
brew install --cask gpg-suite
brew install --cask keybase
```

2. Generate a gpg key with Keybase or with SeaHorse
```sh
keybase pgp gen # then follow the shell process step by step
```

3. Set up the new key to sign all commits
```sh
gpg --list-secret-keys --keyid-format LONG # get the GPG key list
# copy the id between `rsa4096` and the creation date on the `sec` line
git config user.signingkey <id> # add `--global` after `config` to add the GPG key on every repositories
```

4. Add the public PGP key to [GitHub](https://github.com/settings/keys) by clicking on the `New GPG key` button

5. Get the public key and copy it in the clipboard
```sh
keybase pgp export -q <id> | pbcopy
```

6. Copy it in the `key` input on github

## Errors handling

Find the issue:
```sh
echo "test" | gpg --clearsign
```

### `error: gpg failed to sign the data`

1. Add the following lines into `~/.gitconfig`
```sh
[gpg]
	program = /usr/local/MacGPG2/bin/gpg2
```

2. Add the following line into `~/.gnupg/gpg-agent.conf`
```sh
pinentry-program /usr/local/MacGPG2/libexec/pinentry-mac.app/Contents/MacOS/pinentry-mac
```

3. kill all pgp agents
```sh
killall gpg-agent && gpg-agent --daemon --use-standard-socket --pinentry-program /usr/local/bin/pinentry
```

### `gpg: signing failed: Inappropriate ioctl for device`
```sh
export GPG_TTY=(tty)
```

## Security tips

Retrieve the private key to store it on a physical encrypted device
```sh
gpg --export-secret-keys <id> > ~/Desktop/private.key
```

## Export GPG key on a linux computer

1. Install a key manager
```sh
sudo apt install gpa seahorse
```

2. Import the file `private.key`.

3. Open `gpa` and import the retrieved key.

4. Just setup the git repository.
