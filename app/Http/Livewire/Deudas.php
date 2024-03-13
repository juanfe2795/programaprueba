<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Deuda;
use App\Models\Ingreso;

class Deudas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_deuda, $concepto, $valor, $pagado, $fecha_pago, $valor_abono, $info_abono, $fecha_abono, $ingresos_id, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		
		$ingresos = Ingreso::where('borrado', 0)->get();

        return view('livewire.deudas.view', [
            'deudas' => DB::table('deudas as d')
						->leftJoin('ingresos as i', 'd.ingresos_id', 'i.id')
						->select('d.*', 'i.nombre_ingreso')
						->orWhere('d.nombre_deuda', 'LIKE', $keyWord)
						->orWhere('d.concepto', 'LIKE', $keyWord)
						->orWhere('d.valor', 'LIKE', $keyWord)
						->orWhere('d.pagado', 'LIKE', $keyWord)
						->orWhere('d.fecha_pago', 'LIKE', $keyWord)
						->orWhere('d.valor_abono', 'LIKE', $keyWord)
						->orWhere('d.info_abono', 'LIKE', $keyWord)
						->orWhere('d.fecha_abono', 'LIKE', $keyWord)
						->orWhere('d.ingresos_id', 'LIKE', $keyWord)
						->orWhere('d.borrado', 'LIKE', $keyWord)
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
		$this->nombre_deuda = null;
		$this->concepto = null;
		$this->valor = null;
		$this->pagado = null;
		$this->fecha_pago = null;
		$this->valor_abono = null;
		$this->info_abono = null;
		$this->fecha_abono = null;
		$this->ingresos_id = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_deuda' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'pagado' => 'required',
		'fecha_pago' => 'required',
		'valor_abono' => 'required',
		'info_abono' => 'required',
		'fecha_abono' => 'required',
		'ingresos_id' => 'required',
        ]);

        Deuda::create([ 
			'nombre_deuda' => $this-> nombre_deuda,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'pagado' => $this-> pagado,
			'fecha_pago' => $this-> fecha_pago,
			'valor_abono' => $this-> valor_abono,
			'info_abono' => $this-> info_abono,
			'fecha_abono' => $this-> fecha_abono,
			'ingresos_id' => $this-> ingresos_id,
            'updated_at' => null,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Deuda Successfully created.');
    }

    public function edit($id)
    {
        $record = Deuda::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_deuda = $record-> nombre_deuda;
		$this->concepto = $record-> concepto;
		$this->valor = $record-> valor;
		$this->pagado = $record-> pagado;
		$this->fecha_pago = $record-> fecha_pago;
		$this->valor_abono = $record-> valor_abono;
		$this->info_abono = $record-> info_abono;
		$this->fecha_abono = $record-> fecha_abono;
		$this->ingresos_id = $record-> ingresos_id;
		$this->borrado = $record-> borrado;
    }

    public function update()
    {
        $this->validate([
		'nombre_deuda' => 'required',
		'concepto' => 'required',
		'valor' => 'required',
		'pagado' => 'required',
		'fecha_pago' => 'required',
		'valor_abono' => 'required',
		'info_abono' => 'required',
		'fecha_abono' => 'required',
		'ingresos_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Deuda::find($this->selected_id);
            $record->update([ 
			'nombre_deuda' => $this-> nombre_deuda,
			'concepto' => $this-> concepto,
			'valor' => $this-> valor,
			'pagado' => $this-> pagado,
			'fecha_pago' => $this-> fecha_pago,
			'valor_abono' => $this-> valor_abono,
			'info_abono' => $this-> info_abono,
			'fecha_abono' => $this-> fecha_abono,
			'ingresos_id' => $this-> ingresos_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Deuda Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Deuda::where('id', $id);
            $record->update([
				'borrado' => 1,
			]);
        }
    }
}