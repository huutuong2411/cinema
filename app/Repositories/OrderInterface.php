<?php

namespace App\Repositories;

/**
 * Interface ExampleRepository.
 */
interface OrderInterface extends RepositoryInterface
{
    public function orderByShowtimeID($showtimeID);
}
