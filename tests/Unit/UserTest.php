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
     * Test user exists on creation.
     *
     * @return void
     */
    public function testUserExistsOnCreation()
    {
        $user = factory(\App\User::class)->create();
        $userCount = \App\User::where('id', $user->id)->count();

        $this->assertGreaterThan(0, $userCount);
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
     * Test setting a user name.
     *
     * @return void
     */
    public function testSettingUsername()
    {
        $user = factory(\App\User::class)->make(['name' => 'Test User']);
        $this->assertEquals($user->name, 'Test User');
    }


    /**
     * Test deleting a user.
     *
     * @return void
     */
    public function testDeletingAUser()
    {
        $user = factory(\App\User::class)->create(['name' => 'Test User']);
        $user->delete();

        $userCount = \App\User::where('id', $user->id)->count();

        $this->assertLessThan(1, $userCount);
    }
}
