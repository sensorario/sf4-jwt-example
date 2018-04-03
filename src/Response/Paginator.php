<?php

namespace App\Response;

class Paginator
{
    private $requestStack;

    private $offset;

    private $page;

    private $limit;

    public function __construct(
        \Symfony\Component\HttpFoundation\RequestStack $requestStack
    ) {
        $this->requestStack = $requestStack;

        $request = $this->requestStack->getCurrentRequest();

        $this->criteria = $request->query->get('criteria', []);
        $this->page     = $request->query->get('page', 1);
        $this->limit    = $request->query->get('limit', 10);

        $this->offset = ($this->page - 1) * $this->limit;
        if ($this->offset < 0) {
            $this->offset = 0;
        }
    }

    public function offset() : int
    {
        return $this->offset;
    }

    public function page() : int
    {
        return $this->page;
    }

    public function limit() : int
    {
        return $this->limit;
    }

    public function criteria() : array
    {
        return $this->criteria;
    }
}
