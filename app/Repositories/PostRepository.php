<?php

namespace App\Repositories;

use Carbon\Carbon;
use L5Starter\Core\Repositories\BaseRepository;

class PostRepository extends BaseRepository {
    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\Post";
    }
}