<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ingreso;
use App\Models\Empresa;

class Ingresos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_ingreso, $concepto, $valor, $empresas_id, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        
		$empresas = Empresa::where('borrado', 0)->get();
        return view('livewire.ingresos.view', [
            'ingresos' => DB::table('ingresos as i')
                        ->leftJoin('empresas as e', 'i.empresas_id', 'e.id')
						->select('i.*', 'e.nombre_empresa')
						->orWhere('i.nombre_ingreso', 'LIKE', $keyWord)
						->orWhere('i.concepto', 'LIKE', $keyWord)
						->orWhere('i.valor', 'LIKE', $keyWord)
						->orWhere('i.borrado', 'LIKE', $keyWord)
						->paginate(10),
                    'empresa' => $empresas,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_ingreso = null;
		$this->concepto = null;
		$this->valor = null;
		$this->empresas_id = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_ingreso' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'empresas_id' => 'required',
        ]);

        Ingreso::create([ 
			'nombre_ingreso' => $this-> nombre_ingreso,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'empresas_id' => $this-> empresas_id,
            'updated_at' => null,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Ingreso Successfully created.');
    }

    public function edit($id)
    {
        $record = Ingreso::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_ingreso = $record-> nombre_ingreso;
		$this->concepto = $record-> concepto;
		$this->valor = $record-> valor;
		$this->empresas_id = $record-> empresas_id;
		$this->borrado = $record-> borrado;
    }

    public function update()
    {
        $this->validate([
		'nombre_ingreso' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'empresas_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Ingreso::find($this->selected_id);
            $record->update([ 
			'nombre_ingreso' => $this-> nombre_ingreso,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'empresas_id' => $this-> empresas_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Ingreso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Ingreso::where('id', $id);
            $record->update([
				'borrado' => 1,
			]);
        }
    }
}