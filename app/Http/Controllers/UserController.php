<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    //
    public function index()
    {
        global $users;
        return view('pages.users.main',["users"=>$users]);
    }
    public function getUserByIndex($index)
    {
        global $users;
        if (!isset($users[$index])) {
            return "Cannot find the user with index ".$index;
        }
        $user = $users[$index];
        return Response::json($user);
    }
    public function getUserByName($name)
    {
        global $users;
        foreach ($users as $user) {
            if ($user['name'] === $name) {
                return Response::json($user);
            }
        }
        return "Cannot find the user with name ".$name;
    }
    public function getPostByUser($userIndex,$postIndex)
    {
        $userResponse = $this->getUserByIndex($userIndex);
        $userData = json_decode($userResponse->getContent(), true);
        if (!isset($userData['posts'][$postIndex])) {
            return "Cannot find the post with id " . $postIndex . " for user ". $userIndex;
        }
        return $userData['posts'][$postIndex];
    }
}
