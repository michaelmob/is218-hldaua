<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if factory creates a User object.
     *
     * @return void
     */
    public function testFactoryCreatesUser()
    {
        $user = factory(\App\User::class)->make();

        $this->assertInstanceOf(\App\User::class, $user);
    }


    /**
     * Test if fetching all users returns all results.
     *
     * @return void
     */
    public function testUserFetchingReturnsAllResults()
    {
        $users = \App\User::all();
        $userCount = \App\User::count();

        $this->assertCount($userCount, $users);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserExists()
    {
        $this->assertTrue(true);
    }
}
