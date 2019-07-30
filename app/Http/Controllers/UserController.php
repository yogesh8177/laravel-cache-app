<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\RepositoryContract;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    protected $user;

    /**
     * UserController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * List all users.
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'users' => $this->user->all()
        ];
        return $data;
        //return view('templates.users', $data);
    }

    /**
     * Fetch user by its Id
     * 
     * @return user
     */
    public function fetchUser($user_id) {
        $data = $this->user->get($user_id);
        return $data;
        //return view('userDetails', $data);
    }

    /**
     * Update user by its Id
     * 
     * @return update result
     */
    public function updateUser($user_id, Request $request) {
        $result = $this->user->update($user_id, $request->input());
        return $result;
        //return view('userDetails', $result);
    }

    /**
     * Update user by its Id
     * 
     * @return delete result
     */
    public function deleteUser($user_id) {
        $result = $this->user->delete($user_id);
        return $result;
        //return view('deleteDetails', $result);
    }
}