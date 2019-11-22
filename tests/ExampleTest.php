<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * Basic functional test.
     *
     * @test
     * @group=basic
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->get('http://datatables.dev:8080/');
        $response->assertStatus(200);
    }

    /**
     * Simple access test to api routes
     * 
     * @test
     * @group=api
     * @return void
     */
    public function testBasicApiAccessToUsers() {
        $response = $this->get('http://datatables.dev:8080/api/users');
        $response->assertStatus(200);
    }
}
