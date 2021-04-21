# ~/.config/fish/config.fish

# HOMEBREW
set -gx PATH /opt/homebrew/bin $PATH

# GENERAL
source $FLINE_PATH/init.fish
set fish_greeting "There is a gap between code which work and good code"

# STARSHIP
starship init fish | source

# GPG
set -x GPG_TTY (tty)
