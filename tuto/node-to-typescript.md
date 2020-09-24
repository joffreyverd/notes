1. Install the typescript module
```sh
npm install typescript -s
```

2. Add into the `package.json` the following script
```json
"scripts": {
    "tsc": "tsc"
},
```

3. Generate the `tsconfig.json` file by using the following command
```sh
npm run tsc -- --init
```

4. Go into the `tsconfig.json`, then uncomment the `outDir` line and give as value "./build"

5. Compile the application
```sh
npm run tsc
```

6. Execute the application
```sh
node build/app.js
# OR
nodemon build/app.js
```
