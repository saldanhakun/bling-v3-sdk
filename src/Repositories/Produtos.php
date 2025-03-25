<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class Produtos extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'produtos';

    protected $queryParam = 'idsProdutos';

    public function updateSituation(int $id, string $situacao): void
    {
        $this->request('PATCH', $this->uri . '/' . $id . '/situacoes', [
            'json' => [
                'situacao' => $situacao
            ]
        ]);
    }
}