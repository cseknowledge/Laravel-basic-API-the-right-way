<?php

namespace App\Pipeline;

use Illuminate\Pipeline\Pipeline;

abstract class BasePipeline
{
    abstract protected function getFilters(): array;

    public function getResults($contents)
    {
        $results = app(Pipeline::class)
            ->send($contents)
            ->through($this->getFilters())
            ->then(fn ($contents) => $contents['builder']);

        return $results->paginate(5)->withQueryString();
    }
}
