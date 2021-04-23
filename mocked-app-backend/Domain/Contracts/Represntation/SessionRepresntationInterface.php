<?php
namespace Mocked\Domain\Contracts\Represntation;

interface SessionRepresntationInterface{
    public function representSession($sessionData);
    public function representErrors();
}
