<?php
namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Services\CacheService;
use App\User;

class UserRepository implements RepositoryContract {

    protected $cache;
    /**
     * UserRepository constructor.
     *
     * @param CacheService $cache
     */
    public function __construct(CacheService $cache)
    {
        $this->cache = $cache;
    }
    /**
     * Fetch an User by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($user_id)
    {   
        $user = $this->cache->getEntity('user', $user_id);
        if (!$user) {
            $user = User::find($user_id);
            $cacheSetResult = $this->cache->setEntity('user', $user_id, $user);
            $result['cache_hit'] = false;
            $result['user'] = $user;
            return $result;
        }
        else {
            $result['cache_hit'] = true;
            $result['user'] = json_decode($user);
            return $result;
        }
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
        return User::destroy($user_id);
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
        $updatedUser = User::find($user_id);
        $this->cache->setEntity('user', $user_id, $updatedUser);
        return $updatedUser;
    }
}