<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class ContasReceber extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'contas/receber';

    protected $queryParam = 'idContaReceber';

}