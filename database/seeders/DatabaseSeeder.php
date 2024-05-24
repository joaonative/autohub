<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected static ?string $password;


    public function run(): void
    {
        User::factory(5)->create();
        for ($i = 0; $i < 3; $i++) {
            do {
                $email = fake()->unique()->safeEmail();
            } while (User::where('email', $email)->exists());
    
            User::factory()->create([
                'name' => fake()->name(),
                'adm' => true,
                'company_name' => fake()->company(),
                'contact_email' => fake()->companyEmail(),
                'email' => $email,
                'email_verified_at' => now(),
                'phone' => fake()->phoneNumber(),
                'location' => fake()->locale(),
                'site'=> fake()->url(),
                'password' => static::$password ??= Hash::make('adm'),
                'remember_token' => Str::random(10),
            ]);
        }
        Car::factory(100)->create();
    }
}
