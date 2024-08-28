<?php

namespace App\Domain\User\DTO;

use App\Application\User\Http\Requests\StoreUserRequest;
use App\Domain\User\Enum\UserRoleEnum;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Datetime;

class UserCreateDto extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $cpf,
        #[WithCast(EnumCast::class)]
        public readonly UserRoleEnum $role,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d')]
        public readonly Datetime $birthDay,
        public readonly string $zip_code,
    ){}

    /**
     * Create an instance of UserCreateDto from Request
     *
     * @param StoreUserRequest $request
     * @return self
     */
    public static function fromRequest(StoreUserRequest $request): self
    {
        return new self(
            name: $request->string('name')->toString(),
            email: $request->string('email')->toString(),
            password: $request->string('password')->toString(),
            cpf: $request->string('cpf')->toString(),
            role: UserRoleEnum::from($request->integer('role')),
            birthDay: $request->date('birthday', 'Y-m-d'),
            zip_code: $request->string('zip_code')->toString(),
        );
    }

    /**
     * Return the Zip Code
     *
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zip_code;
    }

    /**
     * Transform the User Create DTO to Array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'cpf' => $this->cpf,
            'role_id' => $this->role->value,
            'birth_day' => $this->birthDay->format('Y-m-d'),
            'zip_code' => $this->zip_code,
        ];
    }
}
