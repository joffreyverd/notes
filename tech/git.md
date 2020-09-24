```sh

# clone a remote repository
git clone <httpRepoAdress>

# switch on a specific branch
git checkout <branchName>

# switch on an old commit of the current branch
git checkout [<commitHash>] .

# update local branch
git pull

# change the last commit
git commit --amend

# update one or more of the three last commits
git rebase -i HEAD~3

# delete the last local commit
git reset HEAD~1

# abort the current merge
git merge --abort

# abort the changes
git rebase --abort

# save the changes
git rebase --continue

# /!\ put local branch as the remote branch
git reset --hard origin/dev
#add and commit with comment/time
git commit -am "DEC-4951 #comment feat!(new feature): this is a message #time 1h 20m"

# get differences between two commits
git diff -C -M <commitId> <commitId> "<fileName+fileWay>"
# know config of this repository
git config --list
# change identity of the last commit
git commit --amend --author="Joffrey Verd <jverd@protonmail.com>"

# change url of a remote repository
git remote set-url origin <https://github.com/USERNAME/REPOSITORY.git>

# delete cache of .gitignore on a file which just added to .gitignore of a repo
git rm -r --cached <fileName>

# Go on the global gitconfig file
cat ~/.gitconfig
# change user name on the global config file
git config --global user.name "joffreyverd"
# change user email on the global config file
git config --global user.email "jverd@protonmail.com"
# change user name on the current repo
git config user.name "joffreyverd"
# change user email on the current repo
git config user.email "jverd@protonmail.com"

# list all stash
git stash list
# apply the stash@{0}
git stash apply 0

# ------------- retrieve the commit history on the local branch
# retrieve the remote branches/commits 
git fetch
# delete the local branch
git branch -D branchName
# go on the new local branch
git checkout branchName

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
git rebase -i HEAD~2
# vi -> :wq
git push --force
# abort the changes
git rebase --abort
# save the changes
git rebase --continue

git rebase -i origin/<ticketFullName>~<numberOfCommits>
git rebase -i HEAD~<numberOfCommits> # if I am on the same branch
git push origin <ticketFullName>

# ------------- rebase email history
git filter-branch --env-filter '
        OLD_EMAIL="jverd@unistra.com"
        CORRECT_NAME="joffreyverd"
        CORRECT_EMAIL="jverd@protonmail.com"
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

# ------------- merging an upstream repository into my fork
git checkout master
git pull <sourceRepo> <branchName>
git push origin master

# ------------- delete from the remote repository the last commit
git reset HEAD^
git push origin +HEAD
