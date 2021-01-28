# Bitbucket Pipelines exemple

```yml
image: node:10.15.3

pipelines:
  default:
    - parallel:
      - step:
          name: Lint
          script:
            - npm install
            - npm run lint
      - step:
          name: Test
          script:
            - npm install
            - echo $CONFIG > config.json
            - npm test

  branches:
    main:
    - parallel:
      - step:
          name: Lint
          script:
            - npm install
            - npm run lint
      - step:
          name: Test
          script:
            - npm install
            - echo $CONFIG > config.json
            - npm test
    - step:
        name: Deploy to production
        deployment: production
        script:
          - npm install
          - echo $FIREBASE_AUTHENTICATION > firebase.json
          - echo $CONFIG > config.json
          - pipe: atlassian/rsync-deploy:0.1.0
            variables:
              USER: 'root'
              SERVER: '51.158.113.134'
              REMOTE_PATH: '/opt/<company>/<project>'
              LOCAL_PATH: '.'
          - pipe: atlassian/ssh-run:0.1.1
            variables:
              SSH_USER: 'root'
              SERVER: '51.158.113.134'
              MODE: 'command'
              COMMAND: '/usr/bin/pm2 delete /opt/<company>/<project>/index.js && /usr/bin/pm2 start /opt/<company>/<project>/index.js'
          - pipe: atlassian/slack-notify:0.2.4
            variables:
              WEBHOOK_URL: 'https://hooks.slack.com/services/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'
              MESSAGE: 'ㄟ( ･ө･ )ㄏ - a new version of the project has taken off'
```
