<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Modulo;

class Modulos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_modulo, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.modulos.view', [
            'modulos' => Modulo::latest()
						->orWhere('nombre_modulo', 'LIKE', $keyWord)
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
		$this->nombre_modulo = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_modulo' => 'required',
        ]);

        Modulo::create([ 
			'nombre_modulo' => $this-> nombre_modulo,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Modulo Successfully created.');
    }

    public function edit($id)
    {
        $record = Modulo::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_modulo = $record-> nombre_modulo;
    }

    public function update()
    {
        $this->validate([
		'nombre_modulo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Modulo::find($this->selected_id);
            $record->update([ 
			'nombre_modulo' => $this-> nombre_modulo,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Modulo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Modulo::where('id', $id);
            $record->update([ 
			'borrado' => 1,
            ]);
        }
    }
}