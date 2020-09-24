```sh

# install brew on mac
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

# install formula
brew install <formula>

# homebrew extension to install GUI applications
brew cask install <cask>

# uninstall cask
brew cask rm <formula>

# list the casks
brew cask list -1
# list the formulae
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
