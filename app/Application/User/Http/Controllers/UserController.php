<?php

namespace App\Application\User\Http\Controllers;

use App\Application\User\Http\Requests\StoreUserRequest;
use App\Application\User\Http\Resources\UserResource;
use App\Domain\Address\Exceptions\AddressSearchException;
use App\Domain\User\Actions\CreateUserAction;
use App\Domain\User\Actions\EmployeeListAction;
use App\Domain\User\DTO\UserCreateDto;
use App\Support\Laravel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function employees(EmployeeListAction $employeeListAction)
    {
        $employees = $employeeListAction->execute();

        return UserResource::collection($employees);
    }

    /**
     * @param StoreUserRequest $request
     * @param CreateUserAction $createUserAction
     * @return UserResource
     * @throws AddressSearchException
     */
    public function store(StoreUserRequest $request, CreateUserAction $createUserAction): UserResource
    {
        $user = $createUserAction->execute(
            manager: Auth::user(),
            userDto: UserCreateDto::fromRequest($request),
        );

        return UserResource::make($user);
    }
}
