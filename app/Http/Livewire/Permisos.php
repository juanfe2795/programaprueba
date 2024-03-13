<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Permiso;

class Permisos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $rol_id, $modulo_id, $crear, $ver, $editar, $borrar, $importar, $exportar, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.permisos.view', [
            'permisos' => Permiso::latest()
						->orWhere('rol_id', 'LIKE', $keyWord)
						->orWhere('modulo_id', 'LIKE', $keyWord)
						->orWhere('crear', 'LIKE', $keyWord)
						->orWhere('ver', 'LIKE', $keyWord)
						->orWhere('editar', 'LIKE', $keyWord)
						->orWhere('borrar', 'LIKE', $keyWord)
						->orWhere('importar', 'LIKE', $keyWord)
						->orWhere('exportar', 'LIKE', $keyWord)
						->orWhere('borrado', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->rol_id = null;
		$this->modulo_id = null;
		$this->crear = null;
		$this->ver = null;
		$this->editar = null;
		$this->borrar = null;
		$this->importar = null;
		$this->exportar = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'rol_id' => 'required',
		'modulo_id' => 'required',
		'crear' => 'required',
		'ver' => 'required',
		'editar' => 'required',
		'borrar' => 'required',
		'importar' => 'required',
		'exportar' => 'required',
        ]);

        Permiso::create([ 
			'rol_id' => $this-> rol_id,
			'modulo_id' => $this-> modulo_id,
			'crear' => $this-> crear,
			'ver' => $this-> ver,
			'editar' => $this-> editar,
			'borrar' => $this-> borrar,
			'importar' => $this-> importar,
			'exportar' => $this-> exportar,
			'estado' => 1,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Permiso Successfully created.');
    }

    public function edit($id)
    {
        $record = Permiso::findOrFail($id);
        $this->selected_id = $id; 
		$this->rol_id = $record-> rol_id;
		$this->modulo_id = $record-> modulo_id;
		$this->crear = $record-> crear;
		$this->ver = $record-> ver;
		$this->editar = $record-> editar;
		$this->borrar = $record-> borrar;
		$this->importar = $record-> importar;
		$this->exportar = $record-> exportar;
		$this->borrado = $record-> borrado;
    }

    public function update()
    {
        $this->validate([
		'rol_id' => 'required',
		'modulo_id' => 'required',
		'crear' => 'required',
		'ver' => 'required',
		'editar' => 'required',
		'borrar' => 'required',
		'importar' => 'required',
		'exportar' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Permiso::find($this->selected_id);
            $record->update([ 
			'rol_id' => $this-> rol_id,
			'modulo_id' => $this-> modulo_id,
			'crear' => $this-> crear,
			'ver' => $this-> ver,
			'editar' => $this-> editar,
			'borrar' => $this-> borrar,
			'importar' => $this-> importar,
			'exportar' => $this-> exportar,
			'estado' => $this->estado,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Permiso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Permiso::where('id', $id);
            $record->update([
				'borrado' => 1
			]);
        }
    }
}