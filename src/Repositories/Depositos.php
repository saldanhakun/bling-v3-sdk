<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class Depositos extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'depositos';

    protected $queryParam = 'idsDepositos';

}