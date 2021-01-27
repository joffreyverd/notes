# Clean Code - by Uncle Bob

`Make sure your code is not surprising.`
`Code review is very inefficient, pair programming is very efficient.`
`Comments are often representative of our failure to express ourselves in code.`

## Readability
- 80 characters max per line.
- The purpose of a comment is to explain what the code cannot explain about itself well.
- Variable name length should be proportional to their scope. Exactly the opposit for a function.

## Functions
- Should do a unique thing (single responsability principle).
- Never more than 30 lines - 3 indents - 3 parameters.
### Parameters
- If more than 3 parameters are required, an object injection should be the solution.
- Never pass booleans as parameters! Why? If there is a true statement in the function, its can probably be splited. BTW an instantiate function which takes `true` as parameter is not easily understandable.
### Return types
- A function that returns `void` must have a side effect. A function that returns a value should not have a side effect.
### Errors handling
- Prefere returning exceptions to error codes.
- If my function throw an exception, the first statement of it will me the `try` from `try-catch`.

## Algorithms
- Avoid `switch` statements.
- Avoid `else` statements.
- If loops in loops in loops (etc) that go deeply into a specific data structure -> use lambda.

## Tests
- Each line of code must be covered by a unit test.
