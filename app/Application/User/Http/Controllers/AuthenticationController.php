<?php

namespace App\Application\User\Http\Controllers;

use App\Application\User\Http\Requests\AuthenticateRequest;
use App\Application\User\Http\Resources\AuthenticateResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthenticationController
{
    /**
     * @param AuthenticateRequest $request
     * @return JsonResponse|JsonResource
     */
    public function authenticate(AuthenticateRequest $request): JsonResponse|JsonResource
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();
            $userToken = $user->createToken(
                name: 'authToken',
                abilities: [
                    'role:' . $user->role->name,
                ]
            );

            return AuthenticateResource::make($userToken);
        }

        return response()->json([
            'message' => 'invalid credentials',
        ], ResponseAlias::HTTP_BAD_REQUEST);
    }
}
