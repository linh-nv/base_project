<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService implements ServiceInterface
{
    protected $repository;

    public function all(): Collection
    {
        return $this->repository->all();
    }

    public function find(Model $model): Model
    {
        return $this->repository->find($model);
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(Model $model, array $data): Model
    {
        return $this->repository->update($model, $data);
    }

    public function delete(Model $model): bool
    {
        return $this->repository->delete($model);
    }
}
