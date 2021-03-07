<?php

namespace App\Http\Controllers;

use App\Entities\UserEntity;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(UserRequest $userRequest)
    {
        $userEntity = new UserEntity();

        $userEntity->setName($userRequest->name);
        $userEntity->setEmail($userRequest->email);
        $userEntity->setPassword($userRequest->password);

        return $this->userService->create($userEntity);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
