<?php

namespace src\Persona\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Persona extends Model
{
    protected $fillable = ['id', 'nombre', 'apellido'];


    public static $rules = [
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
    ];

    public static function validationRules($id = null)
    {
        return array_merge(self::$rules, [
            'nombre' => ['required', 'string', 'max:255', Rule::unique('personas')->ignore($id)],
        ]);
    }
}
