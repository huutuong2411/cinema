<?php

namespace App\Services;

use App\Repositories\RoomsInterface;

class RoomsService
{
    protected $roomsRepository;

    /**
     * __construct
     */
    public function __construct(RoomsInterface $roomsRepository)
    {
        $this->roomsRepository = $roomsRepository;
    }

    public function getAll()
    {
        return $this->roomsRepository->all();
    }

    public function createRoom($data)
    {
        return $this->roomsRepository->create($data);
    }

    public function showRoom($id)
    {
        return $this->roomsRepository->show($id);
    }

    public function updateRoom($id, $attributes = [])
    {
        return $this->roomsRepository->update($id, $attributes);
    }

    public function deleteRoom($id)
    {
        return $this->roomsRepository->delete($id);
    }

    public function withTheater()
    {
        return $this->roomsRepository->with(['Theaters.Cities']);
    }

    public function findRoom($id)
    {
        return $this->roomsRepository->find($id);
    }

    public function roomTrash()
    {
        return $this->roomsRepository->onlyTrashed();
    }

    public function restoreRoom($id)
    {
        return $this->roomsRepository->restore($id);
    }

    public function getShowTimeByTheater($id_theater)
    {
        return $this->roomsRepository->getShowTimeByTheater($id_theater);
    }
}
