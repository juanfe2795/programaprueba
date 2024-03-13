<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;

class Empresas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_empresa, $fecha_inicio_contrato, $fecha_fin_contrato, $valor_contrato, $pago_mensual, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empresas.view', [
            'empresas' => Empresa::latest()
						->orWhere('nombre_empresa', 'LIKE', $keyWord)
						->orWhere('fecha_inicio_contrato', 'LIKE', $keyWord)
						->orWhere('fecha_fin_contrato', 'LIKE', $keyWord)
						->orWhere('valor_contrato', 'LIKE', $keyWord)
						->orWhere('pago_mensual', 'LIKE', $keyWord)
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
		$this->nombre_empresa = null;
		$this->fecha_inicio_contrato = null;
		$this->fecha_fin_contrato = null;
		$this->valor_contrato = null;
		$this->pago_mensual = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_empresa' => 'required',
		'fecha_inicio_contrato' => 'required',
		'fecha_fin_contrato' => 'required',
		'valor_contrato' => 'required',
		'pago_mensual' => 'required',
        ]);

        Empresa::create([ 
			'nombre_empresa' => $this-> nombre_empresa,
			'fecha_inicio_contrato' => $this-> fecha_inicio_contrato,
			'fecha_fin_contrato' => $this-> fecha_fin_contrato,
			'valor_contrato' => $this-> valor_contrato,
			'pago_mensual' => $this-> pago_mensual,
            'updated_at' => null,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Empresa Successfully created.');
    }

    public function edit($id)
    {
        $record = Empresa::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_empresa = $record-> nombre_empresa;
		$this->fecha_inicio_contrato = $record-> fecha_inicio_contrato;
		$this->fecha_fin_contrato = $record-> fecha_fin_contrato;
		$this->valor_contrato = $record-> valor_contrato;
		$this->pago_mensual = $record-> pago_mensual;
    }

    public function update()
    {
        $this->validate([
		'nombre_empresa' => 'required',
		'fecha_inicio_contrato' => 'required',
		'fecha_fin_contrato' => 'required',
		'valor_contrato' => 'required',
		'pago_mensual' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empresa::find($this->selected_id);
            $record->update([ 
			'nombre_empresa' => $this-> nombre_empresa,
			'fecha_inicio_contrato' => $this-> fecha_inicio_contrato,
			'fecha_fin_contrato' => $this-> fecha_fin_contrato,
			'valor_contrato' => $this-> valor_contrato,
			'pago_mensual' => $this-> pago_mensual,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Empresa Successfully updated.');
        }
    }

    public function destroy($id)
    {
		if ($id) {
            $record = Empresa::where('id', $id);
            $record->delete();
        }
    }
}