<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class Contatos extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'contatos';

    protected $queryParam = 'idsContatos';

}