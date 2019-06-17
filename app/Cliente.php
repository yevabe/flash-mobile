<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ['codigo', 'nombres', 'apellidos',
    'celular','email','foto', 'user_id','estado', 'correo_creado', 'contrasena_cuenta', 'cuenta_flash', 'fecha_portabilidad', 'fecha_renovacion', 'nip', 'tipo_plan_operador_actual', 'operador', 'numero_a_portar', 'plan_flash_mobile', 'valor_recarga_activacion', 'numero_temporal_flash', 'foto_chip', 'chip', 'activacion', 'referido_nombre', 'referido_id', 'nacimiento', 'departamento', 'ciudad', 'barrio', 'direccion', 'expedicion', 'cedula', 'contrasena_correo'];
}
