<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlanExportacion implements FromCollection,WithHeadings
{

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
