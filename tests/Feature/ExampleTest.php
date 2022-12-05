<?php

namespace Tests\Feature;

use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $test = Category::create([
            'nama'=>'tets'
        ]);
        $this->assertTrue(true);
    }
}
