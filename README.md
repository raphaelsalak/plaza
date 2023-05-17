## Getting started
1. open vscode
2. make a folder named ui-repo
3. open that folder on vscode

## Next, open the command line.
(ctrl + shift + ` )

## Finally, copy over the code to your workspace
```
git clone https://github.com/Spring2023-UI-Group-D/UI-FinalProject.git
cd UI-FinalProject/
```
### You are now connected to the repo. To make changes to the repo you can use the github website or command line in vscode.

## If you want to make a new branch and work on another part of the project
```
git checkout -b "name-of-branch"
git push --set-upstream origin <name-of-branch>
```

## To see the available active branches and switch to one
```
git switch [tab][tab]
```
## To see the latest changes for the branch you are currently in
```
git fetch
```
## If you want the latest changes for the branch you are currently in to go to your local workspace
```
git merge
```

## Push files to the branch you are currently in
```
git add . 
git commit -m "message"
git push
```

## Merge the branch you are currently in to main
After a git push, a pull request will popup.  
A pull request requires at least one reviewer to accept for it to go through.  
After the request is merged and closed, click "Delete branch" popup to delete the branch from github.

## To delete a branch
```
git branch -D <branch>
```

# finalproject
