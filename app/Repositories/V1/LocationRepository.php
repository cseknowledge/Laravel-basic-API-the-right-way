<?php

namespace App\Repositories\V1;

use App\Contracts\V1\LocationInterface;
use App\DataTransferObjects\V1\LocationDTO;
use App\Pipeline\Filters\LocationFilter;
use App\Models\Location;

class LocationRepository extends BaseRepository implements LocationInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function gettingAllData($queryParams = [])
    {
        $queryBuilder = Location::latest();
        return resolve(LocationFilter::class)->getResults([
            'builder' => $queryBuilder,
            'params' => $queryParams
        ]);
    }

    public function addingData(LocationDTO $LocationDTO): Location
    {
        return Location::create($LocationDTO->toArray());
    }

    public function gettingSingleData($Location) {
        return Location::findByIdentifier($Location->uuid);
    }

    public function updatingData(LocationDTO $LocationDTO, Location $Location): Location
    {
        $Location->update($LocationDTO->toArray());
        return $Location->fresh();
    }

    public function deletingData($Location) {
        return $Location->delete();
    }
}
