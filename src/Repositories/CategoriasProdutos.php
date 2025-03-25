<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class CategoriasProdutos extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'categorias/produtos';
}
