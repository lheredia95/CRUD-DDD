<?php

namespace src\Persona\Domain\Repositories;

use src\Persona\Domain\Model\Persona;

interface PersonaRepositoryInterface
{
    public function create(array $data);
    public function update(Persona $persona, array $data);
    public function delete(Persona $persona);
    public function find(int $id);
    public function all();
}
