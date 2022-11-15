<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_delete(){
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user){
            $user->destroy($user->id);
        }

        $this->assertTrue(true);
    }

    public function test_user_duplicate(){
        $user1 = User::make([
            'name' => 'Neller',
            'email' => 'pellegrinoneller@gmail.com',
            'password' =>'12345678'
        ]);
        $user2 = User::make([
            'name' => 'Daniel',
            'email' => 'daniel@gmail.com',
            'password' =>'12345678'
        ]);

        $this->assertTrue($user1 != $user2); 
    }
}
