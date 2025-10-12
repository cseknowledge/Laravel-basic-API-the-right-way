<?php

namespace App\Contracts\V1;

use App\DataTransferObjects\V1\LocationDTO;
use App\Models\Location;

interface LocationInterface extends BaseInterface
{
    public function addingData(LocationDTO $locationDTO): Location;
    public function gettingSingleData($location);
    public function updatingData(LocationDTO $locationDTO, Location $location): Location;
    public function deletingData($location);
}
