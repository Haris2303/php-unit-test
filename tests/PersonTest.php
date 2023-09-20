<?php

namespace Haris\Test;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    private Person $person;

    protected function setUp(): void
    {
    }

    /**
     * @before
     */
    public function createPerson()
    {
        $this->person = new Person("Martin");
    }

    public function testSuccess()
    {
        self::assertEquals("Hello Ucup, my name is Martin", $this->person->sayHello("Ucup"));
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    public function testSayGoodByeSuccess()
    {
        $this->expectOutputString("Good bye Maikel" . PHP_EOL);
        $this->person->sayGoodBye("Maikel");
    }
}
