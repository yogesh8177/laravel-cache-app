<?php
namespace App\Repositories\Contracts;

interface RepositoryContract
{
    /**
     * Get's an entity by it's ID
     *
     * @param int
     */
    public function get($entity_id);

    /**
     * Get's all entities.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes an entity.
     *
     * @param int
     */
    public function delete($entity_id);

    /**
     * Updates an entity.
     *
     * @param int
     * @param array
     */
    public function update($entity_id, array $entity_data);
}