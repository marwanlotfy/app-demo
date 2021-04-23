<?php
namespace Infrastructure\Represntation;

use Mocked\Domain\Contracts\Represntation\SessionRepresntationInterface;

class JsonSessionRepresnter extends AbstractJsonRepresnter implements SessionRepresntationInterface
{
    public function representSession($sessionData)
    {
        return $this->response::json($sessionData);
    }

    public function representErrors()
    {
        return $this->response::json([
            'error' => 'Unauthorized'
        ],401);
    }
}


