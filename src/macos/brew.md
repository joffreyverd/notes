# Brew

```sh

# install brew on mac
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

# install a formula
brew install <formula>

# homebrew extension to install GUI applications
brew install --cask <caskName>

# uninstall a cask
brew cask rm <formula>

# list the formulae & the casks
brew list -1

# update brew
brew update

# update formulae
brew upgrade

# remove broken symlinks
brew cleanup

# brew diagnostic
brew doctor

# uninstall formula
brew rm <formula>
```
