<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Classes\Collection;
use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class SituacoesModulos extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'situacoes/modulos';

    public function getByIdFromAction(int $id): Collection
    {
        $uri = rtrim($this->uri, '/') . '/' . $id . '/acoes';
        $response = $this->request('GET', $uri)->getResponse();

        return new Collection($response->data ?? []);
    }

}