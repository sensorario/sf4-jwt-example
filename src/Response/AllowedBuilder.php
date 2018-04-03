<?php

namespace App\Response;

class AllowedBuilder
{
    private $mapper;

    private $reader;

    public function __construct(
        \Doctrine\Common\Annotations\Reader $reader,
        \App\Response\Mapper $mapper
    ) {
        $this->mapper = $mapper;
        $this->reader = $reader;
    }

    public function build($resource) : array
    {
        $allowed = [];
        $reflClass = new \ReflectionClass($this->mapper->getRepoName($resource));
        $classAnnotations = $this->reader->getClassAnnotations($reflClass);
        foreach ($classAnnotations AS $annot) {
            if ($annot instanceof \App\Response\Render) {
                $allowed = $annot->allow;
            }
        }
        return $allowed;
    }
}
