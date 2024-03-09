<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ($this->command->confirm('truncate dulu asu?', true)) {
            User::truncate();
        }

        $this->admin();
    }

    public function admin()
    {
        User::firstorCreate([
            'name' => 'superadmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('qweasdzxc')
        ]);
    }
}
