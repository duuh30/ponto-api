<?php

namespace App\Domain\User\Actions;

use App\Domain\Address\Exceptions\AddressSearchException;
use App\Domain\Address\Services\AddressService;
use App\Domain\User\DTO\UserCreateDto;
use App\Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

readonly class CreateUserAction
{
    public function __construct(
        private AddressService $addressService
    ){}

    /**
     * Execute the User Creation Business Logic
     *
     * @param User $manager
     * @param UserCreateDto $userDto
     * @return User
     * @throws AddressSearchException
     */
    public function execute(User $manager, UserCreateDto $userDto): User
    {
        $addressData = $this->addressService->searchByZipCode(
            zipCode: $userDto->getZipCode()
        );

        return DB::transaction(function () use ($manager, $userDto, $addressData) {
            /**
             * @var User $user
             */
            $user = $manager->employees()->create($userDto->toArray());
            $user->address()->create($addressData->toArray());

            return $user->load('address');
        });
    }
}
