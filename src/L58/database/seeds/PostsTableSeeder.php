<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create(['text' => 'PRIMO post di Simo', 'id_user' => 1]);

        Post::create(['text' => 'PRIMO post di Anto', 'id_user' => 2]);

        Post::create(['text' => 'PRIMO post di Lori', 'id_user' => 3]);

        Post::create(['text' => 'SECONDO post di Simo', 'id_user' => 1]);

        Post::create(['text' => 'SECONDO post di Anto', 'id_user' => 2]);

        Post::create(['text' => 'SECONDO post di Lori', 'id_user' => 3]);

        Post::create(['text' => 'TERZO post di Simo', 'id_user' => 1]);

        Post::create(['text' => 'TERZO post di Anto', 'id_user' => 2]);

        Post::create(['text' => 'TERZO post di Lori', 'id_user' => 3]);
    }
}
