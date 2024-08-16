<?php

namespace App\Services;

use App\Repository\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class UserService
{

    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function create(array $data): JsonResource
    {
        $userCreated = $this->userRepository->create($data);
        return JsonResource::make($userCreated);
    }

    public function show(int $id): JsonResource
    {
        $user = $this->userRepository->show($id);
        return JsonResource::make($user);
    }

    public function delete(int $id): int
    {
        return $this->userRepository->delete($id);
    }
}
