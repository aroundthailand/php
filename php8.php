<?php

/**
 * Some new features from PHP 8
 */

// Constructor property promotion

class User
{
    //New way of write construct
    public function __construct(
        public string $name,
        public string $surname,
        public string $email,
    ) {
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Features in PHP 8</title>
</head>

<body>
    <header>
        <h1>New Features in PHP 8</h1>
    </header>
    <main>
        <section>
            <h2>Constructor property promotion</h2>

            <code>
                <pre>
                    class Point 
                    {
                        public function __construct(
                            public float $x = 0.0,
                            public float $y = 0.0,
                            public float $z = 0.0,
                        ) {}
                    }
                </pre>
            </code>

            <h2>Union types</h2>
            <code>
                <pre>
                    class Number 
                    {
                        public function __construct(
                            private int|float $number
                        ) {}
                    }

                    new Number('NaN'); // TypeError
                </pre>
            </code>

            <h2>Match expression</h2>
            <code>
                <pre>
                    echo match (8.0) {
                        '8.0' => "Oh no!",
                        8.0 => "This is what I expected",
                    };
                    //> This is what I expected
                </pre>
            </code>

            <h2>Nullsafe operator</h2>
            <code>
                <pre>
                    $country = $session?->user?->getAddress()?->country;
                </pre>
            </code>

            <h2>Saner string to number comparisons</h2>
            <code>
                <pre>
                    0 == 'foobar' // false
                </pre>
            </code>

            <h2>Consistent type errors for internal functions</h2>
            <code>
                <pre>
                    strlen([]); // TypeError: strlen(): Argument #1 ($str) must be of type string, array given

                    array_chunk([], -1); // ValueError: array_chunk(): Argument #2 ($length) must be greater than 0
                </pre>
            </code>


        </section>
    </main>
    <footer></footer>
</body>

</html>