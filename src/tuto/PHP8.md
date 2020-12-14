# PHP 8 release

// https://www.php.net/releases/8.0/en.php

## Named arguments

Before:
```php
htmlspecialchars($string, ENT_COMPAT | ENT_HTML401, 'UTF-8', false);
```

Now:
```php
htmlspecialchars($string, double_encode: false);
```

Specify only required parameters, skipping optional ones.
Arguments are order-independent and self-documented.

## Attributes

Before:
```php
class PostsController
{
    /**
     * @Route("/api/posts/{id}", methods={"GET"})
     */
    public function get($id) { /* ... */ }
}
```

Now:
```php
class PostsController
{
    #[Route("/api/posts/{id}", methods: ["GET"])]
    public function get($id) { /* ... */ }
}
```

Instead of PHPDoc annoptations, you an now use structured metadata with PHP's native syntax.

## Constructor property promotion

Before:
```php
class Point {
  public float $x;
  public float $y;
  public float $z;

  public function __construct(
    float $x = 0.0,
    float $y = 0.0,
    float $z = 0.0,
  ) {
    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }
}
```

Now:
```php
class Point {
  public function __construct(
    public float $x = 0.0,
    public float $y = 0.0,
    public float $z = 0.0,
  ) {}
}
```

Less boilerplate code to define and initialize properties.

## Union types

Before:
```php
class Number {
  /** @var int|float */
  private $number;

  /**
   * @param float|int $number
   */
  public function __construct($number) {
    $this->number = $number;
  }
}

new Number('NaN'); // Ok
```

Now:
```php
class Number {
  public function __construct(
    private int|float $number
  ) {}
}

new Number('NaN'); // TypeError
```

Instead of PHPDoc annotations for a combination of types, you can use native union type declarations that are validated at runtime.

## Match expression

Before:
```php
switch (8.0) {
  case '8.0':
    $result = "Oh no!";
    break;
  case 8.0:
    $result = "This is what I expected";
    break;
}
echo $result;
//> Oh no!
```

Now:
```php
echo match (8.0) {
  '8.0' => "Oh no!",
  8.0 => "This is what I expected",
};
//> This is what I expected
```

The new match is similar to switch and has the following features:
- Match is an expression, meaning its result can be stored in a variable or returned.
- Match branches only support single-line expressions and do not need a break; statement.
- Match does strict comparisons.

## Nullsafe operator

Before:
```php
$country =  null;

if ($session !== null) {
  $user = $session->user;

  if ($user !== null) {
    $address = $user->getAddress();
 
    if ($address !== null) {
      $country = $address->country;
    }
  }
}
```

Now:
```php
$country = $session?->user?->getAddress()?->country;
```

Instead of null check conditions, you can now use a chain of calls with the new nullsafe operator. When the evaluation of one element in the chain fails, the execution of the entire chain aborts and the entire chain evaluates to null.

## Saner string to number comparisons

Before:
```php
0 == 'foobar' // true
```

Now:
```php
0 == 'foobar' // false
```

When comparing to a numeric string, PHP 8 uses a number comparison. Otherwise, it converts the number to a string and uses a string comparison.

## Consistent type errors for internal functions

Before:
```php
strlen([]); // Warning: strlen() expects parameter 1 to be string, array given
array_chunk([], -1); // Warning: array_chunk(): Size parameter expected to be greater than 0
```

Now:
```php
strlen([]); // TypeError: strlen(): Argument #1 ($str) must be of type string, array given
array_chunk([], -1); // ValueError: array_chunk(): Argument #2 ($length) must be greater than 0
```

Most of the internal functions now throw an Error exception if the validation of the parameters fails.

