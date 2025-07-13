<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Repositories\BaseRepository;
use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class BlingContratos extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'contratos';

}