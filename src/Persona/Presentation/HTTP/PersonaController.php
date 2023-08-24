<?php

namespace src\Persona\Presentation\HTTP;

use Illuminate\Http\Request;
use src\Persona\Application\Repositories\PersonaRepository;
use src\Persona\Domain\Model\Persona;

class PersonaController
{
    protected $service;

    public function __construct(PersonaRepository $personaRepository)
    {
        $this->service = $personaRepository;
    }

    public function listar()
    {
        $personas = $this->service->all();
        return view('personas', compact('personas'));
    }

    /*public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $this->service->create($data);

        return redirect()->route('personas.listar');
    }*/

    public function createOrUpdate(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $id = $request->input('id');

        if ($id) {
            $persona = $this->service->find($id);
            $this->service->update($persona->id, $data);
        } else {
            $this->service->create($data);
        }

        return redirect()->route('personas.listar');
    }

    public function edit($id)
    {
        $persona = Persona::find($id);

        return view('personas.listar', compact('persona'));
    }

    public function delete($id)
    {
        $this->service->delete($id);

        return redirect()->route('personas.listar');
    }
}
