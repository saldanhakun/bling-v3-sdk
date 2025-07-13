<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Classes\Collection;
use Saldanhakun\Bling\Repositories\BaseRepository;
use Saldanhakun\Bling\Repositories\Traits\ReadOnlyRepository;

class BlingContasContabeis extends BaseRepository
{
    use ReadOnlyRepository;

    protected $uri = 'contas-contabeis';

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;
    public const STATUS_PENDING = 3;
    public const STATUS_CANCELLED = 4;
    public function list(bool $hideInstitutional=true, bool $hideInvisible=true, array $status=[self::STATUS_ACTIVE]): Collection
    {
        return $this->get(1, 100, [
            'situacoes' => $status,
            'ocultarInvisiveis' => $hideInvisible,
            'ocultarTipoContaBancaria' => $hideInstitutional,
        ]);
    }

}
