<?php
namespace Infrastructure\Represntation;

use Illuminate\Support\Facades\Response;

abstract class AbstractJsonRepresnter
{
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

}


