<?php

namespace App\Dictionary;

class Dictionary implements \App\Response\Mapper
{
    private $resourceToEntityMap = [
        'users' => \App\Entity\User::class,
        'piede' => \App\Entity\Piede::class,
    ];

    public function notContains($resource) : bool
    {
        return !isset($this->resourceToEntityMap[$resource]);
    }

    public function getRepoName($resource) : string
    {
        return $this->resourceToEntityMap[$resource];
    }
}
