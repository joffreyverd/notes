# Create a fish function

```sh

# go in the right folder. If it not exist, juste create it
cd ~/.config/fish/functions

# create the file
vi new-function.fish

# write the function
function see
    cat ~/.config/fish/functions/{$argv}.fish
end

# use the bellow function to save changes
funcsave new-function
```
