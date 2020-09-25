# Terminal configuration

## Terminal

1. On MacOs
```sh
brew cask install iterm2
```
> Go into > iterm2 > preferences > profiles > colors > color presets
> create a file called <myTheme.itermcolors> and put into the iterm-conf.xml content

1. On Linux
```sh
wget https://hypder-updates.now.sh/download/linux_deb # hyper term
```

## Shell

1. Installation
```sh
brew install fish
```

2. Add fish to the know shells
```sh
sudo sh -c 'echo /usr/local/bin/fish >> /etc/shells'
```

3. Restart the terminal /!\

4. Set fish as the default shell
```sh
chsh -s /usr/local/bin/fish
```

5. Restart the terminal /!\

6. Create the config folder
```sh
mkdir -p ~/.config/fish
```

7. Create the config.fish file and push into it the `fish-config.sh` content
```sh
vim ~/.config/fish/config.fish
```

## Prompter

1. Create the folder and the file config
```sh
mkdir -p ~/.config && touch ~/.config/starship.toml
```

2. Create the file and push into it the `starship.toml` content
```sh 
vi ~/.config/starship.toml
```
