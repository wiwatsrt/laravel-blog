<?php

namespace App\Repositories;

use L5Starter\Core\Repositories\BaseRepository;

class PostCategoryRepository extends BaseRepository {
    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\PostCategory";
    }
}
