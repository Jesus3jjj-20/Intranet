<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DistribuidorExportacion implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $consulta;

    public function __construct(object $consultaFiltrada)
    {
        $this->consulta = $consultaFiltrada;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nombre',
        ];
    }

    public function collection()
    {
        return $this->consulta;
    }
}