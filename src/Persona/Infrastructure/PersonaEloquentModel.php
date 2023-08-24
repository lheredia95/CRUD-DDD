<?php

namespace src\Persona\Infrastructure;

use src\Persona\Domain\Model\Persona;
use src\Persona\Domain\Repositories\PersonaRepositoryInterface;

class PersonaEloquentModel implements PersonaRepositoryInterface
{
    public function create(array $data)
    {
        return Persona::create($data);
    }

    public function update(Persona $persona, array $data)
    {
        $persona->update($data);
    }

    public function delete(Persona $persona)
    {
        $persona->delete();
    }

    public function find(int $id)
    {
        return Persona::find($id);
    }

    public function all()
    {
        return Persona::all();
    }
}
