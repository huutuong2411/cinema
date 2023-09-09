<?php

namespace App\Services;

use App\Repositories\ShowtimeInterface;

class ShowtimeService
{
    protected $showtimeRepository;

    /**
     * __construct
     */
    public function __construct(ShowtimeInterface $showtimeRepository)
    {
        $this->showtimeRepository = $showtimeRepository;
    }

    public function getAll()
    {
        return $this->showtimeRepository->all();
    }

    public function createShowtime($data)
    {
        return $this->showtimeRepository->create($data);
    }

    public function showShowtime($id)
    {
        return $this->showtimeRepository->show($id);
    }

    public function updateShowtime($id, $attributes = [])
    {
        return $this->showtimeRepository->update($id, $attributes);
    }

    public function deleteShowtime($id)
    {
        return $this->showtimeRepository->delete($id);
    }

    // public function withTheater()
    // {
    //     return $this->showtimeRepository->with(['Theaters.Cities']);
    // }

    public function findShowtime($id)
    {
        return $this->showtimeRepository->find($id);
    }

    public function showtimeTrash()
    {
        return $this->showtimeRepository->onlyTrashed();
    }

    public function restoreShowtime($id)
    {
        return $this->showtimeRepository->restore($id);
    }

    public function existingShowtimes($newStartTime, $newEndTime)
    {
        return $this->showtimeRepository->existingShowtimes($newStartTime, $newEndTime);
    }

    public function ShowtimeByTheater()
    {
        return $this->showtimeRepository->ShowtimeByTheater();
    }
}