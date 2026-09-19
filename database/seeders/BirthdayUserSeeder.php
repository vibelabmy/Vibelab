<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class BirthdayUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()
            ->where('email', 'sayang@vibelab.test')
            ->where('email', '!=', config('birthday.email'))
            ->update(['email' => config('birthday.email')]);

        User::query()->updateOrCreate(
            ['email' => config('birthday.email')],
            [
                'name' => config('birthday.name'),
                'password' => config('birthday.password'),
                'email_verified_at' => now(),
            ],
        );
    }
}
