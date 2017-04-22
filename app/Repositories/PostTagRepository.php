<?php

namespace App\Repositories;

use L5Starter\Core\Repositories\BaseRepository;

class PostTagRepository extends BaseRepository {
    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\PostTag";
    }
}