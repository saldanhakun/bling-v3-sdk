<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Classes\Collection;
use Saldanhakun\Bling\Repositories\BaseRepository;
use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class BlingNfe extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'nfe';

    public const STATUS_TERMS = [
        1 => 'pending',
        2 => 'cancelled',
        3 => 'awaiting_receipt',
        4 => 'rejected',
        5 => 'authorized',
        6 => 'danfe_emitted',
        7 => 'registered',
        8 => 'awaiting_protocol',
        9 => 'denegated',
        10 => 'status_query',
        11 => 'blocked',
    ];
    public const STATUS_LABELS = [
        1 => 'Pendente',
        2 => 'Cancelada',
        3 => 'Aguardando recibo',
        4 => 'Rejeitada',
        5 => 'Autorizada',
        6 => 'Emitida DANFE',
        7 => 'Registrada',
        8 => 'Aguardando protocolo',
        9 => 'Denegada',
        10 => 'Consulta situação',
        11 => 'Bloqueada',
    ];

    /** @var int Nota fiscal de entrada */
    public const INCOMING = 0;
    /** @var int Nota fiscal de saída */
    public const OUTGOING = 1;

    public function getPeriod(bool $incoming, \DateTimeInterface $start, \DateTimeInterface $end, ?int $status): Collection
    {
        $options = [
            'tipo' => $incoming ? self::INCOMING : self::OUTGOING,
            'situacao' => $status,
            'dataEmissaoInicial' => $start->format('Y-m-d 00:00:00'),
            'dataEmissaoFinal' => $end->format('Y-m-d 23:59:59'),
        ];
        if ($status === null) {
            unset($options['situacao']);
        }
        return $this->get(1, 100, $options);
    }

    public function send(int $id)
    {
        $response = $this->request('POST', sprintf('%s/%s/enviar', $this->uri, $id), [])->getResponse();

        return $response->data ?? null;
    }

    public function launchPayments(int $id)
    {
        $response = $this->request('POST', sprintf('%s/%s/lancar-contas', $this->uri, $id), [])->getResponse();

        return $response->data ?? null;
    }

    public function removePayments(int $id)
    {
        $response = $this->request('POST', sprintf('%s/%s/estornar-contas', $this->uri, $id), [])->getResponse();

        return $response->data ?? null;
    }

    public function launchStock(int $id, ?int $storage=null)
    {
        $response = $this->request('POST', sprintf('%s/%s/lancar-estoque%s', $this->uri, $id, $storage?"/$storage":''), [])->getResponse();

        return $response->data ?? null;
    }

    public function removeStock(int $id)
    {
        $response = $this->request('POST', sprintf('%s/%s/estornar-estoque', $this->uri, $id), [])->getResponse();

        return $response->data ?? null;
    }

}