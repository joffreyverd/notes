# Design patterns in Javascript - by Dmitri Nesteruk on Udemy

## SOLID principles
Introduced by Robert C. Martin (Uncle Bob).

### Single Responsibility Principle
A class should have a unique responsibility.

Example for 2 classes, each having a single responsibility:
```js
const fs = require('fs');

class Journal
{
  constructor() {
    this.count = 0;
    this.entries = {}
  }

  addEntry(text)
  {
    let c = ++ this.count;
    let entry = `${c}: ${text}`;
    this.entries[c] = entry;
    return c;
  }

  removeEntry(index)
  {
    delete this.entries[index];
  }

  toString()
  {
    return Object.values(this.entries).join('\n');
  }
}

class PersistenceManager
{
  preprocess(journal)
  {
    //
  }

  saveToFile(journal, filename)
  {
    fs.writeFileSync(filename, journal.toString());
  }
}

let journal = new Journal();
journal.addEntry('I cried today.');
journal.addEntry('I ate a bug.');
console.log(journal.toString());

let persistence = new PersistenceManager();
persistence.saveToFile(journal, '~/Documents/journal.txt');
```

### Open-Closed Principle
- Open for extension: it means a class should be able to works with other new classes with flexibility.
- Closed for modification: it means a class should not been modified.

Example where no matter the number of filters are applies, the classes stay open for extension and closed for modification:
```js
let Color = Object.freeze({
    red: 'red',
    green: 'green',
    blue: 'blue'
});

let Size = Object.freeze({
    small: 'small',
    medium: 'medium',
    large: 'large',
    yuge: 'yuge'
});

class Product
{
    constructor(name, color, size) {
        this.name = name;
        this.color = color;
        this.size = size;
    }
}

let apple = new Product('Apple', Color.green, Size.small);
let tree  = new Product('Tree', Color.green, Size.large);
let house = new Product('House', Color.blue, Size.large);
let products = [apple, tree, house];

interface ISpecification {
    isSatisfied(item) {}
}

class ColorSpecification implements ISpecification
{
    constructor(color) {
        this.color = color;
    }

    isSatisfied(item)
    {
        return item.color === this.color;
    }
}

class SizeSpecification implements ISpecification
{
    constructor(size) {
        this.size = size;
    }

    isSatisfied(item)
    {
        return item.size === this.size;
    }
}

class ProductFilter
{
    filter(items, spec)
    {
        return items.filter(x => spec.isSatisfied(x));
    }
}

class AndSpecification implements ISpecification
{
    // combinator to fill as much specifications as needed
    constructor(...specs) {
        this.specs = specs;
    }

    isSatisfied(item)
    {
        return this.specs.every(x => x.isSatisfied(item));
    }
}

let productFilter = new ProductFilter();
const color = Color.green;
const size = Size.large;
const colorSpecification = new ColorSpecification(color);
const sizeSpecification = new SizeSpecification(size);

console.log(`${color} products:`);
for (let p of productFilter.filter(products, colorSpecification)) {
    console.log(` * ${p.name} is green`);
}

console.log(`${size} products:`);
for (let p of productFilter.filter(products, sizeSpecification)) {
    console.log(` * ${p.name} is large`);
}

console.log(`${size} and ${color} products:`);
let spec = new AndSpecification(colorSpecification, sizeSpecification);

for (let p of productFilter.filter(products, spec)) {
    console.log(` * ${p.name} is ${size} and ${color}`);
}
```

### Liskov Substitution Principle
