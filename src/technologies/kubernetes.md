# Kubernetes

```sh
# rebuild a new docker image from the right directory
docker build -t joffreyverd/posts:0.0.1 .
# create a pod in the default node by going in `infra/k8s` and executing the following:
kubectl apply -f posts.yaml
# make sure the pod has been created and its running:
kubectl get pods

# run a pod
kubectl exec -it <podName> -- <cmd>

# get logs from a pod
kubectl logs <podName>

# delete a pod
kubectl delete pod <podName>

# create a new pod from the config file
kubectl apply -f <configFileName>

# print info on a running pod
kubectl describe pod <podName>
```
