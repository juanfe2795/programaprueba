<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ahorro;
use App\Models\Ingreso;

class Ahorros extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_ahorro, $concepto, $valor, $ingresos_id, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';

		$ingresos = Ingreso::where('borrado', 0)->get();
        return view('livewire.ahorros.view', [
            'ahorros' => DB::table('ahorros as a')
                        ->leftJoin('ingresos as i', 'a.ingresos_id', 'i.id')
                        ->select('a.*', 'i.nombre_ingreso')
						->orWhere('a.nombre_ahorro', 'LIKE', $keyWord)
						->orWhere('a.concepto', 'LIKE', $keyWord)
						->orWhere('a.valor', 'LIKE', $keyWord)
						->orWhere('a.ingresos_id', 'LIKE', $keyWord)
						->orWhere('a.borrado', 'LIKE', $keyWord)
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
		$this->nombre_ahorro = null;
		$this->concepto = null;
		$this->valor = null;
		$this->ingresos_id = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_ahorro' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'ingresos_id' => 'required',
        ]);

        Ahorro::create([ 
			'nombre_ahorro' => $this-> nombre_ahorro,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'ingresos_id' => $this-> ingresos_id,
            'updated_at' => null,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Ahorro Successfully created.');
    }

    public function edit($id)
    {
        $record = Ahorro::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_ahorro = $record-> nombre_ahorro;
		$this->concepto = $record-> concepto;
		$this->valor = $record-> valor;
		$this->ingresos_id = $record-> ingresos_id;
		$this->borrado = $record-> borrado;
    }

    public function update()
    {
        $this->validate([
		'nombre_ahorro' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'ingresos_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Ahorro::find($this->selected_id);
            $record->update([ 
			'nombre_ahorro' => $this-> nombre_ahorro,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'ingresos_id' => $this-> ingresos_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Ahorro Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Ahorro::where('id', $id);
            $record->update([
				'borrado' => 1,
			]);
        }
    }
}