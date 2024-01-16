<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Nachas4',
            'email' => 'test@test.com',
            // 'pfp_file' => '1_pfp.png' ==> Remember, images don't get pushed to GH; setting a custom pfp only exists on your PC
        ]);

        User::factory()->create([
            'name' => 'Klozon',
            'email' => 'test@example.com'
        ]);

        User::factory()->create([
            'name' => 'hason4',
            'email' => 'example@test.com'
        ]);
        
        User::factory(10)->create();
    }
}
