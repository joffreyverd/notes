# Change default repo branch from `master` to `main`

1. Create main branch locally, taking the history from master
```sh
git branch -m master main
```

2. Push the new local main branch to the remote repo (GitHub)
```sh
git push -u origin main
```

3. Switch the current HEAD to the main branch
```sh
git symbolic-ref refs/remotes/origin/HEAD refs/remotes/origin/main
```

4. Change the default branch on GitHub to main

5. Delete the master branch on the remote
```sh
git push origin --delete master
```
