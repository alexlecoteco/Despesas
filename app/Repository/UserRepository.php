<?php

namespace App\Repository;

use App\Models\User;

readonly class UserRepository
{
    public function __construct(private User $userModel)
    {
    }

    public function create(array $data)
    {
        return $this->userModel->create($data);
    }

    public function show(int $id)
    {
        return $this->userModel->find($id);
    }

    public function delete(int $id): int
    {
        return $this->userModel->destroy($id);
    }
}
