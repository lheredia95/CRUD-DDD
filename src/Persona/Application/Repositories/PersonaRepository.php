<?php

namespace src\Persona\Application\Repositories;

use src\Persona\Domain\Repositories\PersonaRepositoryInterface;

class PersonaRepository
{
    protected $repository;

    public function __construct(PersonaRepositoryInterface $personaRepositoryInterface)
    {
        $this->repository = $personaRepositoryInterface;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        $persona = $this->repository->find($id);

        $this->repository->update($persona, $data);
    }

    public function delete(int $id)
    {
        $persona = $this->repository->find($id);

        $this->repository->delete($persona);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function all()
    {
        return $this->repository->all();
    }
}
