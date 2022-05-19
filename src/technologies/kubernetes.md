# Kubernetes

## Commands

### Pods

```sh
# rebuild a new docker image from the right directory
docker build -t joffreyverd/posts:0.0.1 . # or use the "latest" tag
# create a pod in the default node by going in `infra/k8s` and executing the following:
kubectl apply -f posts.yaml
# make sure the pod has been created and its running:
kubectl get pods

# run a pod
kubectl exec -it <podName> -- <cmd>

# get logs from an object
kubectl logs <objectName>

# delete an object
kubectl delete <object> <podName>

# create a new pod from the config file
kubectl apply -f <configFileName> # same when creating any new object (deployment, service, etc)

# print info on a running object
kubectl describe <object> <podName> # object = pod, deployment, service, etc
```

### Deployments

```sh
kubectl get deployments
kubectl describe deployment <depName>
kubectl apply -f <configFileName>
kubectl delete deployment <depName>
```

## Updating deployments

### Method n°1

- Make a change in the code
- Rebuild the image specifying a new version
- In the deployment config file, update the version of the image
- Run the following:

```sh
kubectl apply -f <deplFileName>
```

### Method n°2

- The deployment must be using the `latest` tag in the pod spec section
- Make an update into the code
- Build the image
- Push the image to docker hub
- Restart the k8s deployment

```sh
cd <serviceFolder>
docker build -t joffreyverd/<serviceName> .
docker push joffreyverd/<serviceName>
kubectl rollout restart deployment <deplName>
```

### Method n°3

- Use a tool called `Skaffold` to automate tasks in a kubernetes dev environment:

```sh
brew install skaffold
```

- Create a config file on the root directory
- Run the dev stack:

```sh
skaffold dev # control + C to quit the process and delete every pods
```

## ingress-nginx

- Install & deploy on k8s:

```sh
kubectl apply -f https://raw.githubusercontent.com/kubernetes/ingress-nginx/controller-v1.0.5/deploy/static/provider/cloud/deploy.yaml
```

- Write the config file and apply it
- Edit the `/etc/hosts` file to trick ingress-nginx in dev environment:

```sh
sudo vi /etc/hosts
# then write the following
127.0.0.1 <host> # exemple: 127.0.0.1 posts.com
```
