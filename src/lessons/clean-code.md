# Clean Code - by Uncle Bob

`Make sure your code is not surprising.`
`Code review is very inefficient, pair programming is very efficient.`

## General
- Never more than 80 characters on a single line
- Write unit tests for every single line of code we write.
- Side effects: exemple -> allocation and free memory. It's a feature that always come with a pair of function to change a state. The fact is, if we put it in the wrong way, it create inconsistency and break. To deal with side effects, use lambdas.
- The purpose of a comment is to explain what the code cannot explain about itself well. Comments are often representative of our failure to express ourselves in code.
- Variable name length should be proportional to their scope. Exactly the opposit for a function.

## Functions
- Always do a single thing (responsibility principle)
- Never more than 30 lines - 3 indents - 3 parameters
- If a function must take 6 parameters, why is it not a single parameter which works as an object?
- Never pass booleans as parameters! Why? If there is a true statement in the function, its can probably be splited. BTW an instantiate function which takes `true` as parameter is not easily understandable.
- A function that returns `void` must have a side effect. A function that returns a value should not have a side effect.
- Prefere returning exceptions to error codes.
- If my function throw an exception, the first statement of it will me the `try` from `try-catch`
- DRY principle: `Don't repeat yourself`.
- If loops in loops in loops (etc) that go deeply into a specific data structure -> use lambda.

## Algorithms
- Avoid `switch` statements
- Avoid `else` statements

## Architecture
