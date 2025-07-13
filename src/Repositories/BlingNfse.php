<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Classes\Collection;
use Saldanhakun\Bling\Repositories\BaseRepository;
use Saldanhakun\Bling\Repositories\Traits\CrudRepository;

class BlingNfse extends BaseRepository
{
    use CrudRepository;

    protected $uri = 'nfse';

    public const STATUS_QUERY_PENDING = 1;
    public const STATUS_QUERY_EMITTED = 2;
    public const STATUS_QUERY_AVAILABLE = 3;
    public const STATUS_QUERY_CANCELLED = 4;

    public function getPeriod(\DateTimeInterface $start, \DateTimeInterface $end, int $status): Collection
    {
        return $this->get(1, 100, [
            'situacao' => $status,
            'dataEmissaoInicial' => $start->format('Y-m-d 00:00:00'),
            'dataEmissaoFinal' => $end->format('Y-m-d 23:59:59'),
        ]);
    }

    public function getConfig(): ?\stdClass
    {
        $response = $this->request('GET', rtrim($this->uri, '/') . '/configuracoes')->getResponse();

        return $response->data ?? null;
    }

    public function updateConfig(array $data)
    {
        $response = $this->request('PUT', rtrim($this->uri, '/') . '/configuracoes', [
            'json' => $data
        ])->getResponse();

        return $response->data ?? null;
    }

    public function send(int $id)
    {
        $response = $this->request('POST', sprintf('%s/%s/enviar', $this->uri, $id), [])->getResponse();

        return $response->data ?? null;
    }

    public function cancel(int $id)
    {
        $response = $this->request('POST', sprintf('%s/%s/cancelar', $this->uri, $id), [])->getResponse();

        return $response->data ?? null;
    }

}