# Publish a package on `npm`

1. Create a remote repository on github

2. Add a user to the repository by connecting to an existing account
```sh
npm adduser
```

3. Login to npm
```sh
npm login
```

4. Publish the package
```sh
npm publish
```

5. Unpublish an old package
```sh
npm unpublish @<userName>/<packageName> --force
```
