# Clean Code - by Maximilian Schwarzmüller on Udemy

## Intro

### Key pain points
1. Naming (classes, functions, variables),
2. Structure & comments,
3. Functions length & parameters,
4. Conditionals & error handling,
5. Classes, objects & data structures.

### Solutions
1. Rules & concepts,
2. Patterns & principles,
3. Test-driven development.

---

## Naming
- Must be meaningful,
- Avoid redundant info,
- Avoid slang or abbreviations,
- Choose distinctive names,
- Stay consistent.

### Object names
- Variables are data containers -> nouns & adjectives,
- Functions are commands & operations -> verbs,
- Classes creates things -> nouns.

### Name casing
- snake_case,
- camelCase -> variables & functions,
- PascalCase -> Classes,
- kebab-case -> HTML elements & style properties.

---

## Comments
- If comments are needed, that's because the code is not clean enought,
- Mostly bad, avoid them (except few exceptions),
- Avoid dividers,
- Can sometime be misleading,
- Keeping old code commented is totally usefull (git),
- Same for legal informations headers (git).

### Good comments
- Regex,
- Warnings,
- Design patterns description,
- Documentation link.

---

## Code formatting
- Vertical & horizontal.

### Limits
- 100 lines/file,
- 1 classe/file,
- 3 arguments/function,
- 30 lines/function,
- 80 characters/line,
- 3 nested level/function (cognitive complexity).

### Structure
- Keep related methods closed.

---

## Functions

### Input
- Calling a function & working with the function should both be easy.
- Minimize the parameters of the function and their understandability.
- To many arguments whould maybe mean we should split the function or pass an object.
- Ban booleans as parameters because they des not give any info about what they do.

### Output
- Avoid manipulate the input parameter instead of returning another value.

### Respnsability
- A function should do a single thing.
- Separe high-level & low-level of abstraction.
- We are not supposed to find low-level code into a high-level function.

### Reusability
- Stay DRY (Don't Repeat Yourself).
- Use common sense to know if the refactore improve or not the reusability.
- Avoid "magic numbers & strings" -> store it directly in a constant.

### Side effects
- Try keeping functions pure -> the same input generate the same output.
- Avoid side effects.

---

## Control structure
- Extract control structures into other functions.
- Prefere positive phrasing.
- Use guards.
- Inverting condtional logic.
- Throwing custom errors.

### Guards & fail fast
Wrong:
```js
if (isEmailValid) {
    if (isPasswordValid) {
        // Do stuff
    } else {
        return;
    }
    return;
}
```

Right:
```js
if (!isEmailValid) {
    return; // Guard -> fail fast
}
if (!isPasswordValid) {
    return;
}
// Do stuff
```

### Errors
```js
function doStuff() {
    if (!isValid) {
        throw new Error('Invalid!');
    }
    // Do stuff
}

try {
    const isValid = false;
    doStuff(isValid);
} catch(e) {
    console.log(e)
}
```

### Factory functions & polymorphism
- Factory function produces an object.

Factory function exemple:
```js

function processCreditCardPayment(transaction) {
    // Do stuff
}

function processCreditCardRefund(transaction) {
    // Do stuff
}

function processPaypalPayment(transaction) {
    // Do stuff
}

function processPaypalRefund(transaction) {
    // Do stuff
}

function processPlanPayment(transaction) {
    // Do stuff
}

function processPlanRefund(transaction) {
    // Do stuff
}

function getTransactionProcessors(transaction) {
    let processors = { payment: null, refund: null }
    if (transaction === 'creditCard') {
        processors.payment = processCreditCardPayment;
        processors.refund = processCreditCardRefund;
    }
    if (transaction === 'paypal') {
        processors.payment = processPaypalPayment;
        processors.refund = processPaypalRefund;
    }
    if (transaction === 'plan') {
        processors.payment = processPlanPayment;
        processors.refund = processPlanRefund;
    }
    return processors;
}

const processors = getTransactionProcessors(transaction);
processors.refund(transaction);
```

---

## Classes & objects

### Objects vs Data structures
- An object hide its properties (privates) and give access to public methods. It contains business logic.
- A data object let accessible its properties. It stores and transports data.
- An object should never let public properties accessibles.

### Polymorphism
- "The ability of an object to take on many forms".

Exemple:
```ts
type Purchase = any;

let Logistics: any;

interface Delivery {
  deliverProduct();
  trackProduct();
}

class DeliveryImplementation {
  protected purchase: Purchase;

  constructor(purchase: Purchase) {
    this.purchase = purchase;
  }
}

class ExpressDelivery extends DeliveryImplementation implements Delivery {
  deliverProduct() {
    Logistics.issueExpressDelivery(this.purchase.product);
  }

  trackProduct() {
    Logistics.trackExpressDelivery(this.purchase.product);
  }
}

class InsuredDelivery extends DeliveryImplementation implements Delivery {
  deliverProduct() {
    Logistics.issueInsuredDelivery(this.purchase.product);
  }

  trackProduct() {
    Logistics.trackInsuredDelivery(this.purchase.product);
  }
}

class StandardDelivery extends DeliveryImplementation implements Delivery {
  deliverProduct() {
    Logistics.issueStandardDelivery(this.purchase.product);
  }

  trackProduct() {
    Logistics.trackStandardDelivery(this.purchase.product);
  }
}

function createDelivery(purchase) {
  if (purchase.deliveryType === 'express') {
    delivery = new ExpressDelivery(purchase);
  } 
  if (purchase.deliveryType === 'insured') {
    delivery = new InsuredDelivery(purchase);
  } else {
    delivery = new StandardDelivery(purchase);
  }
  return delivery;
}

let delivery: Delivery = createDelivery({});

delivery.deliverProduct();
```

### Multiple levels of abstraction (cohesion)
- Maximum cohesion: all methods in a class use all class properties -> highly cohesion object.

### Lay of Demeter
- Avoid drilling deeply into nested objects.
- Principle of lest knowledge: Don't depend on the internals of "strangers" (other objects you don't know directly).

exemple:
```js
this.customer.lastPurchase.date;
```

### SOLID Principles
- S: Single Responsibility Principle,
- O: Open-Closed Principle,
- L: Liskov Substitution Principle,
- I: Interface Segregation Principle,
- D: Dependency Inversion Principle.

#### Single Responsibility Principle (SRP)
- A class should have a single responsibility.
- A class shouldn't change for more than one reason.
- Classes must be realy precises and focus on a specific topic.

#### Open-Closed Principle
A class should be open for extension but closed for modification.

bad exemple:
```ts
class Printer {
    printPDF() {}

    printWord() {}
}
```
This class will be open for modification every time we want to print a new type of document.

good exemple:
```ts
interface IPrinter {
    print(data: any);
}

class Printer {
    verifyData(data: any) {}
}

class wordPrinter extends Printer implements IPrinter {
    print(data: any) {};
}

class pdfPrinter extends Printer implements IPrinter {
    print(data: any) {};
}
```

#### Liskov Principle
Objects should be replacables with instances of their subclasses whitout altering the behavior.

#### Interface Segregation Principle
Many client-specific interfaces are better than one general purpose interface.

#### Dependency Inversion Principle
You should depend upon abstractions, not concretions.
