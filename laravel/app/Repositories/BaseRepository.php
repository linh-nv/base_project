<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected Model $_model;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model
     * @return string
     */
    abstract public function getModel(): string;

    /**
     * Set model
     */
    public function setModel(): void
    {
        $this->_model = app()->make($this->getModel());
    }

    /**
     * Get All
     * @return Collection|static[]
     */
    public function all(): Collection
    {

        return $this->_model->get();
    }

    /**
     * Get one
     * @param Model $model
     * @return Model
     */
    public function find(Model $model): Model
    {

        return $model;
    }

    /**
     * Create
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {

        return $this->_model->create($attributes);
    }

    /**
     * Update
     * @param Model $model
     * @param array $attributes
     * @return Model
     */
    public function update(Model $model, array $attributes): Model
    {
        $model->update($attributes);

        return $model;
    }

    /**
     * Delete
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model): bool
    {
        $model->delete();

        return true;
    }
}
