# Design patterns in Javascript - by Dmitri Nesteruk on Udemy

## SOLID principles
Introduced by Robert C. Martin (Uncle Bob).

### Single Responsibility Principle
A class should have a unique responsibility.

Exemple for 2 classes, each having a single responsibility:
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
