# Git

The [convention](https://www.conventionalcommits.org) I use to write commits.

```sh

# clone a remote repository
git clone <httpRepoAdress>

# switch on a specific branch
git checkout <branchName>

# switch on an old commit of the current branch
git checkout [<commitHash>] .

# update local branch
git pull

# see the commit history
git log
# verify a commit GPG signature
git verify-commit <commitId>

# change the last commit
git commit --amend

# delete the last local commit
git reset HEAD~1

# abort the current merge
git merge --abort

# /!\ put local branch as the remote branch
git reset --hard origin/dev
# commit
git commit -am "<commitMessage>"
# signed commit
git commit -S -am "<commitMessage>"

# get differences between two commits
git diff -C -M <commitId> <commitId> "<fileName+fileWay>"
# know config of this repository
git config --list
# change identity of the last commit
git commit --amend --author="<name> <email>"

# change url of a remote repository
git remote set-url origin <https://github.com/USERNAME/REPOSITORY.git>

# delete cache of .gitignore on a file which just added to .gitignore of a repo
git rm -r --cached <fileName>

# ------------- setup the .gitconfig file
# get the global gitconfig file
cat ~/.gitconfig
# get the local gitconfig from a repository
cat .git/config
# change user name on the current repo
git config user.name "<name>" # add `--global` after `config` to do the same as a global config
# change user email on the current repo
git config user.email "<email>" # idem
# add GPG key on the current repo for the existing user
git config user.signingkey <id> # idem

# list all stash
git stash list
# apply the stash@{0}
git stash apply 0

# ------------- retrieve the commit history on the local branch
# retrieve the remote branches/commits
git fetch
# delete the local branch
git branch -D <branchName>
# go on the new local branch
git checkout <branchName>

# ------------- recover a dropped stash
git log --graph --oneline --decorate ( git fsck --no-reflog | awk '/dangling commit/ {print $3}' )
git stash apply <commitHash>

# ------------- create a new branch locally from an existing distant branch
git checkout -b <myNewBranch> <existingDistantBranch>
# then the modifications are committed, push on the remote branch
git push --set-upstream origin <myNewBranch>

# ------------- change the remote repository
# get the current
git config --get remote.origin.url
# set the new one
git remote set-url origin <repositoryAdress>

# ------------- resolve conflict
git checkout <branchContainingConflict>
git pull origin dev
# RESOLVE CONFLICT
git commit
git push origin HEAD

# ------------- rebasing
# abort the changes
git rebase --abort
# save the changes
git rebase --continue

git rebase -i origin/<ticketFullName>~<numberOfCommits>
git rebase -i HEAD~<numberOfCommits> # if I am on the same branch
git push origin <ticketFullName>

# ------------- rebase email history
git filter-branch --env-filter '
OLD_EMAIL="<oldEmail>"
CORRECT_NAME="<oldName>"
CORRECT_EMAIL="<newEmail>"
if [ "$GIT_COMMITTER_EMAIL" = "$OLD_EMAIL" ]
then
        export GIT_COMMITTER_NAME="$CORRECT_NAME"
        export GIT_COMMITTER_EMAIL="$CORRECT_EMAIL"
fi
if [ "$GIT_AUTHOR_EMAIL" = "$OLD_EMAIL" ]
then
        export GIT_AUTHOR_NAME="$CORRECT_NAME"
        export GIT_AUTHOR_EMAIL="$CORRECT_EMAIL"
fi
' --tag-name-filter cat -- --branches --tags
git push --force
git update-ref -d refs/original/refs/heads/master

# ------------- merging an upstream repository into a fork
git checkout master
git pull <sourceRepo> <branchName>
git push origin master

# ------------- delete from the remote repository the last commit
git reset HEAD^
git push origin +HEAD

# ------------- squash multiple commits into a single one
git rebase -i HEAD~<N> # the N last commits
# write `s` instead on pick in the editor, except for the first one, then w/q
# change or not the default new commit message which pop, then w/q
git push --f

# ------------- handle a pushed commit on the wrong remote branch
git log # retrieve the commit id
git reset --hard HEAD~1 # remove the last commit
git checkout -b <goodBranch> # go to the right branch
git reset --hard <commitId> # commit on the right branch
git push
```
