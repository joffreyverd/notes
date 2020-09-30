# starship configuration

```toml

# Disable the package module, hiding it from the prompt completely
[nodejs]
disabled = true
[php]
disabled = true

[git_branch]
symbol = "🌱 "

[git_status]
conflicted = " 🏳 "
ahead = " 🏎💨 "
behind = " 😰 "
diverged = " 😵 "
untracked = " 🤷 "
stashed = " 📦 "
modified = " 📝 "
staged.value = "++"
staged.style = "green"
staged_count.enabled = true
staged_count.style = "green"
renamed = " 👅 "
deleted = " 🗑 "

[time]
disabled = false
format = "🕙 %T "
utc_time_offset = -5
```