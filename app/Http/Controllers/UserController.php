<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected UserInterface $repository;

    public function __construct(UserInterface $user)
    {
        $this->repository=$user;
    }

    /**
     * Display a listing of the resource.
     */

    public function register(UserRegisterRequest $request)
    {
        return $this->repository->register($request);
    }

    public function login(UserLoginRequest $request)
    {
        return $this->repository->login($request);
    }
}
