<?php

namespace App\Repositories;

use App\Models\admin\Rooms;

/**
 * Class ExampleRepository.
 */
class RoomsRepository extends BaseRepository implements RoomsInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function getModel()
    {
        return Rooms::class;
    }

    public function getShowTimeByTheater($id_theater)
    {
        return $this->model
            ->where('id_theater', $id_theater)
            ->get();
    }
    /**
     * getExamples
     *
     * @return mixed
     */
}
