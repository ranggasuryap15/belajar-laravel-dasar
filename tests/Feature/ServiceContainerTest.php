<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use App\Data\Bar;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testCreateDependency()
    {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo", $foo->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertNotSame($foo, $foo2);
    }

    public function testBind()
    {
        // closure atau parameter kedua itu untuk memberi tahu, kalo mau pake Class Person, maka function ini yang akan dipanggil
        $this->app->bind(Person::class, function ($app){ 
            return new Person("Rangga", "Surya");
        });

        // function closure selalu akan dipanggil

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Rangga", $person1->firstName);
        self::assertEquals("Rangga", $person2->firstName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingleton()
    {
        // closure atau parameter kedua itu untuk memberi tahu, kalo mau pake Class Person, maka function ini yang akan dipanggil
        $this->app->singleton(Person::class, function ($app){ 
            return new Person("Rangga", "Surya");
        });

        // function closure selalu akan dipanggil

        $personSingle1 = $this->app->make(Person::class);
        $personSingle2 = $this->app->make(Person::class); 

        self::assertEquals("Rangga", $personSingle1->firstName);
        self::assertEquals("Rangga", $personSingle2->firstName);
        self::assertNotSame($personSingle2, $personSingle2);
    }

    public function testInstance()
    {
        $person = new Person("Rangga", "Surya");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Rangga", $person1->firstName);
        self::assertEquals("Rangga", $person2->firstName);
        self::assertSame($person1, $person2);
        self::assertSame($person1, $person2);
    }

    public function testDependencyInjetion()
    {
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar->foo);
        self::assertSame($bar, $bar2);
    }

    public function testInterfaceToClass()
    {
        // ini untuk jika tidak terlalu kompleks
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // ini digunakan jika ada yang kompleks
        $this->app->singleton(HelloService::class, function($app){
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals("Halo Rangga", $helloService->hello("Rangga"));


    }
}
