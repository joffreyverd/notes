# The binary system

The **bit** (binary digit) is a basic unit of information in computing and digital communications. The bit represents a logical state with one of two possible values: `1/0`. Othere representations like `true/false`, `yes/no`, `+/-`.

In the computing theory, a single bit represent the minimal quantity of data a message can send. Because of that, it is the base unit in programming.

Today, a **byte (octet in french)** contain 8 bits. Until the 70's, there was bytes with variable sizes.

There is several **bases** (Base16 - hexadecimal, Base32, Base64).

- ASCII -> 1 character = 7 bits (1 byte)
- UNICODE -> 1 character = 16 bits (2 bytes)

## How do we count in decimal system?
There is 10 numbers: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9. With these numbbers, we can count until 9. If we want to go above, we need to change of rank: 10, 100, 1000, etc.
That's why 56 = `50 + 6` but also `5*10^1 + 6*10^0`.

## How do we count in the binary system?
A binary bit field ofen begin with this prefix to reconize him **`0b`**: 0b001011.
```sh
0 = 0
1 = 1
2 = 10
3 = 11
4 = 100
5 = 101
6 = 110
7 = 111
8 = 1000
9 = 1001
10 = 1010
11 = 1011
12 = 1100
13 = 1101
14 = 1111
```

### Run into a bit field
```py
# here we store in a single variable all data with there values when they are checked
days = [
    0 => 0b0000001, # Monday
    1 => 0b0000010, # Tuesday
    2 => 0b0000100, # Wednesday
    3 => 0b0001000, # Thursday
    4 => 0b0010000, # Friday
    5 => 0b0100000, # Saturday
    6 => 0b1000000 # Sunday
]

a = 0b0001111 # Monday, Tuesday, Wednesday and Thursday are all checked
if (a & days[5]) {
    # if a include Wednesday, then execute something here
}
```

### Bitwise Operators
```sh
# & (bitwise AND)
# | (bitwise OR)
# ~ (bitwise NOT)
# ^ (bitwise XOR)
# << (bitwise left shift)
# >> (bitwise right shift)
# >>> (bitwise unsigned right shift)
# &= (bitwise AND assignment)
# |= (bitwise OR assignment)
# ^= (bitwise XOR assignment)
# <<= (bitwise left shift and assignment)
# >>= (bitwise right shift and assignment)
# >>>= (bitwise unsigned right shift and assignment)
```


## Conversion from decimal to binary

### By using the `power of 2` method
```sh
26 = 16 + 8 + 2 # only use power 2 to decompose the number
26 = 1*16 + 1*8 + 1*2
26 = 1*2^4 + 1*2^3 + 1*2^1 # memo: 2^4 = 2*2*2*2
26 = 1*2^4 + 1*2^3 + 0*2^2 + 1*2^1 + 0*2^0 # add the missing power 2 (4, 3, 2, 1, 0 here)
26 = 11010 # the first number of each group
```

### By using the `euclidean divisions` method
This method is **more convenient to write it as an algorithm**. If our number is 164:
```sh
164/2 =  82 + 0
82/2 = 41 + 0
41/2 = 20 + 1
20/2 = 10 + 0
10/2 = 5 + 0
5/2 = 2 + 1 # if 2,5: keep the last higher number then if it stay something so 1
2/2 = 1 + 0
1/2 = 0 + 1 # 0,5: exactly the same thing
```
Read it the the bottom to the top and we will see the following binary: 10100100.

## Conversion from binary to decimal

For exemple: 1010110. There is 7 ranks in this number et each rank correspond to a power of 2. By beginning at the end, the first rank is the 0 rank, the second one is the 1 rank, etc. So we just need to multiply the value of the rank by 2 with a power of the rank himself:
```sh
0*2^0 + 1*2^1 + 1*2^2 + 0*2^3 + 1*2^4 + 0*2^5 + 1*2^6 # need to begin by the last binary
0 + 2 + 4 + 0 + 16 + 0 + 64 = 86
```

## Hexadecimal (Base16)

A hexadecimal bit field ofen begin with this prefix to reconize him **`0x`**: 0x001011.
| hex       | decimal   | binary    |
|-----------|-----------|-----------|
| 0         | 0         |  0000     |
| 1         | 1         |  0001     |
| 2         | 2         |  0010     |
| 3         | 3         |  0011     |
| 4         | 4         |  0100     |
| 5         | 5         |  0101     |
| 6         | 6         |  0110     |
| 7         | 7         |  0111     |
| 8         | 8         |  1000     |
| 9         | 9         |  1001     |
| A         | 10        |  1010     |
| B         | 11        |  1011     |
| C         | 12        |  1100     |
| D         | 13        |  1101     |
| E         | 14        |  1110     |
| F         | 15        |  1111     |
