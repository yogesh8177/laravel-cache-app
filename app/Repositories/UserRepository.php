<?php
namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\User;

class UserRepository implements RepositoryContract {
    /**
     * Fetch an User by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($user_id)
    {
        return User::find($user_id);
    }

    /**
     * Fetches all Users.
     *
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Deletes an User.
     *
     * @param int
     */
    public function delete($user_id)
    {
        User::destroy($user_id);
    }

    /**
     * Updates an User.
     *
     * @param int
     * @param array
     */
    public function update($user_id, array $user_data)
    {
        User::find($user_id)->update($user_data);
    }
}