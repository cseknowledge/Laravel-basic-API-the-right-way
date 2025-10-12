<?php

namespace App\Repositories\V1;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\ModuleRelationTrait;
use Illuminate\Support\Traits\ForwardsCalls;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BaseRepository
{
    use ForwardsCalls, ModuleRelationTrait;

    protected array $methodMap = [
        'getAllData'    => 'gettingAllData',
        'getSingleData'  => 'gettingSingleData',
        'addData'     => 'addingData',
        'updateData' => 'updatingData',
        'deleteData' => 'deletingData',
    ];

    public function __call($method, $parameters): mixed
    {
        if (!isset($this->methodMap[$method])) {
            throw new NotFoundHttpException("$method not found in the respective controller.");
        }

        $targetMethod = $this->methodMap[$method];

        try {
            if (Str::startsWith($method, ['add', 'get', 'sync', 'update', 'remove'])) {
                return DB::transaction(function () use ($targetMethod, $parameters) {
                    return $this->forwardCallTo($this, $targetMethod, $parameters);
                }, 5);
            }
            return $this->forwardCallTo($this, $targetMethod, $parameters);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
