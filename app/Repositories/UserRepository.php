<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $attributes)
    {
        return User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
        ]);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
    
}
