<?php

namespace App\Response;

interface Mapper
{
    public function notContains($resource) : bool;

    public function getRepoName($resource) : string;
}
