<?php

namespace App\Controller;

use App\ApiConfigObject\Bar;
use App\ApiConfigObject\Collection;
use App\ApiConfigObject\Foo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/", name="api")
     */
    public function index(Collection $collection)
    {
        return $this->json([
            'bar code' => $collection->get(Bar::class)->getCode(),
            'foo code' => $collection->get(Foo::class)->getCode(),
        ]);
    }
}
