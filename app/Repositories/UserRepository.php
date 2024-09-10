<?php
namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function register($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);
        $user->update(['code' => helper_core_code_generator($user->id)]);
        $token = auth('api')->login($user);
        $data = [
            'user' => $user,
            'token' => $token,
        ];
        return response_success($data);
    }

    public function login($request)
    {
        $credentials = request(['email', 'password']);
        if (! $token = auth('api')->attempt($credentials)) {
            return helper_response_unauthorized();
        }
        $data = [
            'user' => auth('api')->user(),
            'token' => $token,
        ];
        return response_success($data);

    }

}

?>
