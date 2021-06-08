<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function testRequest()
    {
        $data = [
            'name' => 'Andrey',
            'email' => 'andreymail@email.net',
            'password' => 'secret'
        ];
        $user = User::create($data);

        $this->assertNotEmpty($user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertNotEmpty($user->password);
        $this->assertFalse($user->isAdmin());
    }
}
