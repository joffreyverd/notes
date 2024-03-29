# MongoDB

```sh
# installation on macos
brew tap mongodb/brew
brew install mongodb-community@5.0
# run a local database
brew services start mongodb-community@5.0
# check the database is running
brew services list

# install the npm package
npm i mongodb
```

Get the current version:
```js
db.version();
```

Initialisation from a `js` file:
```js
const mongodb = require('mongodb');
const { MongoClient, ObjectId } = mongodb;

MongoClient.connect(
    'mongodb://127.0.0.1:27017', 
    { useNewUrlParser: true }
).then((client) => {
    const db = client.db('database-name');
    // db calls here...
}).catch((e) => console.log(e));
```

## Create

Insert a single document into a collection:
```js
db.collection('users').insertOne({
    name: 'Joffrey',
    age: 28
}).then((result) => {
    console.log(result.insertedId);
}).catch((e) => console.log(e));
```

Insert multiple documents into a collection:
```js
db.collection('users').insertMany([
    { name: 'Bobby', age: 17 },
    { name: 'Gunther', age: 46 }
]).then((result) => {
    console.log(result.insertedIds);
}).catch((e) => console.log(e));
```

## Read

Fetch all documents into a collection corresponding to the given filter:
```js
db.collection('users').find({
    name: 'Bob'
}, {
    sort: { name: 1 },
    projection: { _id: 0, name: 1, age: 1 },
}).toArray().then((result) => {
    console.log(result);
}).catch((e) => console.log(e));
```

Count documents into a collection corresponding to the given filter:
```js
    const options = {};
    db.collection('users').find({
        name: 'Bob'
    }, options).count().then((result) => {
        console.log(result);
    }).catch((e) => console.log(e));
```

Fetch the first focument into a collection corresponding to the given filter:
```js
const options = {};
db.collection('users').findOne({
    name: 'Bob'
}, options).then((result) => {
    console.log(result);
}).catch((e) => console.log(e));
```

## Update

Update a single or multiple fields into a single document:
```js
db.collection('users').updateOne({
    _id: new ObjectId('6139afa9064ab17994640147')
}, {
    $set: { name: 'Mike' }
}).then((result) => {
    console.log(result);
}).catch((e) => console.log(e));
```

Update multiple fields into multiple documents:
```js
db.collection('users').updateMany({
    age: 31
}, {
    $set: { age: 32 }
}).then((result) => {
    console.log(result);
}).catch((e) => console.log(e));
```

## Delete

Delete a single document:
```js
db.collection('users').deleteOne({
    _id: ObjectId('6139afa9064ab17994640147')
}).then((result) => {
    if (result.deletedCount === 1) {
        return console.log('Successfully deleted one document');
    }
    console.log('No documents matched the query. Deleted 0 documents.');
}).catch((e) => console.log(e));
```

Delete many documents:
```js
db.collection('users').deleteMany({
    name: 'Bobby'
}).then((result) => {
    const { deletedCount } = result;
    if (deletedCount >= 1) {
        return console.log(`Successfully ${deletedCount} deleted document`);
    }
    console.log('No documents matched the query. Deleted 0 documents.');
}).catch((e) => console.log(e));
```
