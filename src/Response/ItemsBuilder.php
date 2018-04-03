<?php

namespace App\Response;

class ItemsBuilder
{
    private $mapper;

    private $manager;

    private $allowedBuilder;

    private $total;

    private $paginator;

    private $items;

    private $resource;

    private $page;

    public function __construct(
        \Doctrine\ORM\EntityManagerInterface $manager,
        \App\Response\Mapper $mapper,
        \App\Response\Paginator $paginator,
        \App\Response\AllowedBuilder $allowedBuilder
    ) {
        $this->mapper         = $mapper;
        $this->manager        = $manager;
        $this->allowedBuilder = $allowedBuilder;
        $this->paginator      = $paginator;
    }

    public function loadResources() : array
    {
        $repositoryName = $this->mapper->getRepoName($this->resource);

        $repository = $this->manager->getRepository($repositoryName);

        $allRecords = $repository->findBy(
            $this->paginator->criteria(),
            $orderBy = []
        );

        $this->total = count($allRecords);

        $currentPage = array_splice(
            $allRecords,
            $this->paginator->offset(),
            $this->paginator->limit()
        );

        return $currentPage;
    }

    public function items()
    {
        return $this->items;
    }

    public function total()
    {
        return $this->total;
    }

    public function page()
    {
        return $this->paginator->page();
    }

    public function init($resource)
    {
        $this->resource = $resource;

        $allowed = $this->allowedBuilder->build($resource);
        $resources = $this->loadResources();

        $this->items = [];
        foreach ($resources as $resource) {
            $item = [];
            foreach ($allowed as $field => $accessor) {
                $item[$field] = $resource->$accessor();
            }
            $this->items[] = $item;
        }
    }
}
