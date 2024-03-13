<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Egreso;
use App\Models\Ingreso;

class Egresos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_egreso, $concepto, $valor, $ingresos_id, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';

		$ingresos = Ingreso::where('borrado', 0)->get();
        return view('livewire.egresos.view', [
            'egresos' => DB::table('egresos as eg')
                        ->leftJoin('ingresos as i', 'eg.ingresos_id', 'i.id')
                        ->select('eg.*', 'i.nombre_ingreso')
						->orWhere('eg.nombre_egreso', 'LIKE', $keyWord)
						->orWhere('eg.concepto', 'LIKE', $keyWord)
						->orWhere('eg.valor', 'LIKE', $keyWord)
						->orWhere('eg.ingresos_id', 'LIKE', $keyWord)
						->orWhere('eg.borrado', 'LIKE', $keyWord)
						->paginate(10),
                    'ingresos' => $ingresos,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_egreso = null;
		$this->concepto = null;
		$this->valor = null;
		$this->ingresos_id = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_egreso' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'ingresos_id' => 'required',
        ]);

        Egreso::create([ 
			'nombre_egreso' => $this-> nombre_egreso,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'ingresos_id' => $this-> ingresos_id,
            'updated_at' => null,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Egreso Successfully created.');
    }

    public function edit($id)
    {
        $record = Egreso::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_egreso = $record-> nombre_egreso;
		$this->concepto = $record-> concepto;
		$this->valor = $record-> valor;
		$this->ingresos_id = $record-> ingresos_id;
		$this->borrado = $record-> borrado;
    }

    public function update()
    {
        $this->validate([
		'nombre_egreso' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'ingresos_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Egreso::find($this->selected_id);
            $record->update([ 
			'nombre_egreso' => $this-> nombre_egreso,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'ingresos_id' => $this-> ingresos_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Egreso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Egreso::where('id', $id);
            $record->update([
				'borrado' => 1,
			]);
        }
    }
}