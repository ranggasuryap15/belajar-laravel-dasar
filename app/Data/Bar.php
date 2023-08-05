<?php

namespace App\Data;

class Bar
{
    // ini disebut Dependency Injection
    private Foo $foo; // class bar sangat bergantung atau depend ke kelas Foo (Bar depends-on Foo)

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;

        // ini disarankan menggunakan construct untuk terlihat jelas dependenciesnya dan tidak lupa menambahkan dependenciesnya
    }

    public function bar(): string
    {
        return $this->foo->foo() . " And Bar";
    }
}