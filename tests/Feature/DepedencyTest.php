<?php

namespace Tests\Feature;


use App\train\People;
use App\train\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class DepedencyTest extends TestCase
{
    /** @test */
    public function DependTest()
    {
        // $name = new People();

        $this->app->bind(Person::class, function () {
            return new Person("Hello");
        });

        $name = $this->app->make(Person::class);

        assertEquals("Hello", $name->firstName);
    }
}
