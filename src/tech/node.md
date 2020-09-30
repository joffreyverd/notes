# Node

```js

//---------------------- ASYNCHRONOUS TASKS ----------------------
async function test() {
    // async is usefull only to call await
    // fetch return a Promise object
    const a = await fetch('');
    // here the next line will be executed when fetch is done
    const b = a;
}
const c = 'hop';
// flow: a, b, c

const a = fetch('');
a.then(() => {
    const b = 'hip';
});
const c = 'hop';
// flow: a, c, b

function promiseGenerator() {
    return new Promise((resolve, reject) => {
        // do some stuff and returns a Promise when its done
    });
}
const myTask = promiseGenerator();

//---------------------- FUNCTIONS TYPES ----------------------
// classic function
function test(a) {
    return a;
}
test(a);

// arrow function
const test = (a) => {
    return a;
}
test(a);

// arrow anonymous function
((a, b, c) => {
    const d = a + b + c; // d = 6
})(1, 2, 3);

//---------------------- SCOP ----------------------
class Streaming {
    constructor() {
        this.name = 'test';
    }

    test() {
        stream.on('data', function() {
            console.log(this.name); // this.name = undefined
        });

        stream.on('data', () => {
            console.log(this.name); // name = 'test'
        });
    }
}

//---------------------- TRICKS ----------------------
// ternary condition
var canDrive = (age >= 16) ? "You're allowed to drive!" : "You should be 16 to drive!";

// arrow function
object.method = () => 'result of this method';

// get the current date
const now = Date.now();
const now = +new Date;

// try-catch
try {
    // do some stuff...
} catch (e) {
    throw e;
}
```
