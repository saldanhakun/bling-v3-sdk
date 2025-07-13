<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Classes\Collection;
use Saldanhakun\Bling\Repositories\BaseRepository;
use Saldanhakun\Bling\Repositories\Traits\ReadOnlyRepository;

class BlingCategoriasReceitasDespesas extends BaseRepository
{
    use ReadOnlyRepository;

    protected $uri = 'categorias/receitas-despesas';

    public const STATUS_ALL = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;
    public const TYPE_ALL = 0;
    public const TYPE_EXPENSE = 1;
    public const TYPE_INCOME = 2;
    public const TYPE_BOTH = 3;
    public function list(int $type=self::TYPE_ALL, int $status=self::STATUS_ALL): Collection
    {
        return $this->get(1, 100, [
            'situacao' => $status,
            'tipo' => $type,
        ]);
    }

}
