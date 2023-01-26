<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
{
    protected $model = Servicio::class;

    public function definition()
    {
        return [
            'servicio' => $this->faker->name,
            'plan_id' => 1,
            'tipo_id' => rand(1,6),
            'distribuidor_id' => 1,
            'factura_distribuidor' => rand(0,1),
            'comision_distribuidor' => rand(0,1),
            'proveedor_id' => 1,
            'cliente_id' => rand(1,2),
            'fecha_alta' => date("Y-m-d"),
            'fecha_expiracion' => date("Y-m-d" , mt_rand(strtotime(\Carbon\Carbon::now()->add(1,'day')->format('Y-m-d')), strtotime("2023-12-31"))),
            'fecha_baja' => null,
            'notas' => null,
            'estado_id' => 1,
            'mail_administrativo' => $this->faker->unique()->safeEmail,
            'observaciones' => null,
            'precio' => 256.23,
            'periodificacion_cliente' => "trimestral",
            'periodificacion_proveedor' => "anual", 
        ];
    }
}
