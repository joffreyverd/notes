# Heroku

```sh
# installation
brew tap heroku/brew && brew install heroku
```

```sh
# CLI login
heroku login
```

```sh
# upload public ssh key on heroku
heroku keys:add <public key>
```

```sh
# create a new heroku project (from the right directory)
heroku create <name> # a unique name is mandatory
```

## Node.js usage

Be sure the script section in the package.json contains the following:
```json
"start": "node src/app.js"
```

Use the env variable for the port instead of a static value to run the app:
```js
const port = process.env.PORT || 3000;
```

Check there an heroku repository exist using:
```sh
git remote
```

Push the code
```sh
git push heroku main
```

Get the current config
```sh
heroku config
```

Apply a specific config
```sh
heroku config:set JWT_SECRET=<secret> MONGODB=<path>
```
