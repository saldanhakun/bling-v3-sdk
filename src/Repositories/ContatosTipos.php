<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class ContatosTipos extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'contatos/tipos';
}
