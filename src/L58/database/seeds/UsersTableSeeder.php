<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Simone', 'email' => 'simonecostant1997@gmail.com', 'password' => '$2y$10$i55W4b.54yKJirg9sM.VK.xwxjbn8wXIKzIlelxCqZ1KNrnezi6MW']);

        User::create(['name' => 'Antonio', 'email' => 'antonio@gmail.com', 'password' => '$2y$10$i55W4b.54yKJirg9sM.VK.xwxjbn8wXIKzIlelxCqZ1KNrnezi6MW']);

        User::create(['name' => 'Lorenzo', 'email' => 'lorenzo@gmail.com', 'password' => '$2y$10$i55W4b.54yKJirg9sM.VK.xwxjbn8wXIKzIlelxCqZ1KNrnezi6MW']);
    }
}
