<?php

namespace App\Services\V1;

use App\DataTransferObjects\V1\LocationDTO;
use App\Models\Location;
use Illuminate\Support\Str;

class LocationService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->initLocation();
    }

    public function all(array $queryParams = [])
    {
        return $this->locationRepository->getAllData($queryParams);
    }

    public function store(array $validatedData): Location
    {
        $locationDTO = LocationDTO::fromRequest($validatedData);
        return $this->locationRepository->addData($locationDTO);
    }

    public function show($location) {
        return $this->locationRepository->getSingleData($location);
    }

    public function update(array $validatedData, Location $location)
    {
        $locationDTO = LocationDTO::fromRequest($validatedData);
        return $this->locationRepository->updateData($locationDTO, $location);
    }

    public function delete($location) {
        return $this->locationRepository->deleteData($location);
    }
}
