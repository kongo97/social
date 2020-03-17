<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all posts of this user.
     *
     * @return array
     */
    public function getAllPosts($id_user)
    {
        // get list of followed users
        $followed_users = DB::table('follows')->where('id_follower', $id_user)->get();

        $in = [$id_user];

        foreach($followed_users as $key_followed => $followed) {
            $in[] = $followed->id_followed;
        }

        // get all posts of this user
        $users = DB::table('posts')->whereIn('id_user', $in)->get();

        return $users;
    }

    /**
     * Get all posts of this user.
     *
     * @return array
     */
    public function getPosts($id_user)
    {
        // get all posts of this user
        $users = DB::table('posts')->where('id_user', $id_user)->get();

        return $users;
    }

    /**
     * Check if $id_follower is a follwer of $id_followed
     *
     * @return array
     */
    public function isFollwer($id_followed, $id_follower)
    {
        // get all posts of this user
        $user = DB::table('follows')
            ->where('id_followed', $id_followed)
            ->where('id_follower', $id_follower)
            ->first();

        if($user) {
            return true;
        }

        echo "Non segui ancora questo utente.";

        return false;
    }
}
