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
            /**
             * Comment this out and then see profiler, and then see `config/services.yaml` and disable lazy loading
             * of those `ApiConfigObject\Bar|Foo` objects and then you should see that both are initialized, if those
             * are lazy loaded and line below is commented that `Foo` class is not initialized.
             */
            //'foo code' => $collection->get(Foo::class)->getCode(),
        ]);
    }
}
