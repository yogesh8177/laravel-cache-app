<?php
namespace App\Services;

use Illuminate\Support\Facades\Redis;

class CacheService {
    public function getEntity($entity_type, $entity_id) {
        $entity = Redis::get(''.$entity_type.':'.$entity_id);
        return $entity;
    }

    public function setEntity($entity_type, $entity_id, $entity) {
        return Redis::set(''.$entity_type.':'.$entity_id, $entity);
    }
}