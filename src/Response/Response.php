<?php

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class Response
{
    private $itemsBuilder;

    public function __construct(
        \App\Response\ItemsBuilder $itemsBuilder
    ) {
        $this->itemsBuilder = $itemsBuilder;
    }

    public function notFound() : JsonResponse
    {
        return new JsonResponse([
            'code' => 404,
            'message' => 'Oops! Resource not found',
        ], 404);
    }

    public function hateoas($resource) : JsonResponse
    {
        $this->itemsBuilder->init($resource);

        $total = $this->itemsBuilder->total();

        $items = $this->itemsBuilder->items();

        $page = $this->itemsBuilder->page();

        return new JsonResponse([
            'total' => $total,
            'page' => $page,
            '_embedded' => [
                'items' => $items,
            ],
        ], 200);
    }
}
