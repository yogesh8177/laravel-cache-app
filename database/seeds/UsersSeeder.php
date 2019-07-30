<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $json = File::get('database/seedData/users.json');
        $data = json_decode($json);

        foreach ($data as $user) {
            User::create(array(
                'id' => $user->id,
                'user_name' => $user->user_name,
                'email' => $user->email,
                'password' => $user->password,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ));
        }
    }
}
