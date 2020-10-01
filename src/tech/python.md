# Python

```py

# Asign a value to a variable siultaneously
name, age = 'Juan', 25

# Create a condition
if name == 'Juan' and age == 25:
    print('My name is Juan and Im 25')
if name == 'Juan' or name == 'Morray':
    print('My name is' + name or 'Morray')

# Play with the lists
mylist = [1, 2, 3, 4, 5]
for x in mylist:
    print(x)

# Repeat a string
lotsofhellos = 'hello' * 10
print(lotsofhellos)

# Create a function
def new_function():
    print('This is a function')

# Call the new function
new_function()

# Create a classe
class NewClass:
  variable = 'lol'

  def another_function(self)

# Call the new classe
newObject = NewClass()

# Access to a variable from a new object
print(newObject.variable) #return 'lol'

# Change the variable of an object
newObject.variable = 'loooool'
print(newObject.variable) # returns 'loooool'

# Create a dictionarie
ages = {}
ages['Juan'] = 25
ages['Stevy'] = 20
ages['Thomas'] = 22
print(ages) #return the entiere dictionarie with all keys and values

# Or like this
ages = {
    'Juan' : 25,
    'Stevy' : 20,
    'Thomas' : 22
}
print(ages)

# Iterate on a dictionarie
for name, age in ages.items():
    print('Age of %s is %d' % (name, age))

# Testing if a value exist or not in the dictionary
if 'Juan' in phonebook:
    print('Juan is listed in the dictionary')
if 'Bob' not in phonebook:
    print('Bob is not listed in the dictionary')
```
