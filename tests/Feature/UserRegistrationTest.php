<?php

namespace Tests\Feature;

use App\Events\UserWasRegistered;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegistrationTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    /** @test */
    public function user_was_registered_event_fires_upon_successful_registration()
    {
        $this->expectsEvents(UserWasRegistered::class);

        $this->post('/register',[
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);
    }

    /** @test */
    public function no_events_fire_upon_non_successful_registration()
    {
        $this->doesntExpectEvents(UserWasRegistered::class);

        $this->post('/register',[
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'passwords dont match'
        ]);
    }
}
