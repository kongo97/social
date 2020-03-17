<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Test function User->getPost()
     *
     * @return array
     */
    public function getPosts($id_followed)
    {
        // intialize User object
        $User = new User();

        // get current user id
        $user_id = Auth::id();

        // check if current user follows searched user
        if($user_id == $id_followed || $User->isFollwer($id_followed, $user_id)) {
            // get all user's posts
            $posts = $User->getPosts($id_followed);

            echo "<pre>";
            print_r($posts);
            echo "</pre>";
        }
    }

    /**
     * Print session
     *
     * @return array
     */
    public function printSession(Request $request)
    {
        // get all session's data
        $data = $request->session()->all();

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    /**
     * Get all posts
     *
     * @return array
     */
    public function getAllPosts()
    {
        // intialize User object
        $User = new User();

        // get current user id
        $user_id = Auth::id();

        // get all followed posts
        $posts = $User->getAllPosts($user_id);

        echo "<pre>";
        print_r($posts);
        echo "</pre>";
    }
}
