# Use `super-lint` locally

1. Run docker

2. Pull the latest docker image
```sh
docker pull github/super-linter:latest
```

3. Run the linter on the entiere repo
```sh
docker run -e RUN_LOCAL=true -v ~/<repoPath>:/tmp/lint github/super-linter
```

4. Run the linter on a single file
```sh
docker run -e RUN_LOCAL=true -v ~/<filePath>:/tmp/lint/file github/super-linter
```
