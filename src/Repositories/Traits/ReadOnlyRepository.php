<?php

namespace Saldanhakun\Bling\Repositories\Traits;

use Saldanhakun\Bling\Classes\Collection;

trait ReadOnlyRepository
{
    public function get(int $pagina = 1, int $limite = 100, array $filtros = []): Collection
    {
        $response = $this->request(
            'GET',
            $this->uri,
            [
                'query' => [
                    'pagina' => $pagina,
                    'limite' => $limite,
                ] + $filtros
            ]
        )->getResponse();

        return new Collection($response->data ?? []);
    }

    public function getById(int $id): ?\stdClass
    {
        $response = $this->request('GET', rtrim($this->uri, '/') . '/' . $id)->getResponse();

        return $response->data ?? null;
    }

}
