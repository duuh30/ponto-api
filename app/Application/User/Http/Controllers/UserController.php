<?php

namespace App\Application\User\Http\Controllers;

use App\Application\User\Http\Requests\StoreUserRequest;
use App\Application\User\Http\Resources\UserResource;
use App\Domain\Address\Exceptions\AddressSearchException;
use App\Domain\User\Actions\CreateUserAction;
use App\Domain\User\Actions\DestroyEmployeeAction;
use App\Domain\User\Actions\EmployeeListAction;
use App\Domain\User\DTO\UserCreateDto;
use App\Support\Laravel\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Returns all the employees
     *
     * @param EmployeeListAction $employeeListAction
     * @return JsonResource
     */
    public function employees(EmployeeListAction $employeeListAction): JsonResource
    {
        $employees = $employeeListAction->execute();

        return UserResource::collection($employees);
    }

    /**
     * Manager delete the Employee
     *
     * @param DestroyEmployeeAction $action
     * @param int $employeeId
     * @return Response
     */
    public function destroyEmployee(DestroyEmployeeAction $action, int $employeeId): Response
    {
        $action->execute(
            manager: Auth::user(),
            employeeId: $employeeId
        );

        return response()->noContent();
    }

    /**
     * Store employee
     *
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
