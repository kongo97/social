<?php

use Illuminate\Database\Seeder;
use App\Follow;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Follow::create(
            ['id_follower' => 1, 'id_followed' => 2]
        );

        Follow::create(
            ['id_follower' => 1, 'id_followed' => 3]
        );

        Follow::create(
            ['id_follower' => 2, 'id_followed' => 3]
        );

        Follow::create(
            ['id_follower' => 3, 'id_followed' => 1]
        );
    }
}
