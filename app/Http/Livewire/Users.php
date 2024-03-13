<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombres, $apellidos, $tipo_documento, $cedula, $email, $img_user, $estado, $borrado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.users.view', [
            'users' => DB::table('users as u')
						->select('u.*')
						->orWhere('u.nombres', 'LIKE', $keyWord)
						->orWhere('u.apellidos', 'LIKE', $keyWord)
						->orWhere('u.tipo_documento', 'LIKE', $keyWord)
						->orWhere('u.cedula', 'LIKE', $keyWord)
						->orWhere('u.email', 'LIKE', $keyWord)
						->orWhere('u.img_user', 'LIKE', $keyWord)
						->orWhere('u.estado', 'LIKE', $keyWord)
						->orWhere('u.borrado', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombres = null;
		$this->apellidos = null;
		$this->tipo_documento = null;
		$this->cedula = null;
		$this->email = null;
		$this->img_user = null;
		$this->estado = null;
		$this->borrado = null;
    }

    public function store()
    {
        $this->validate([
		'nombres' => 'required',
		'apellidos' => 'required',
		'tipo_documento' => 'required',
		'cedula' => 'required',
		'email' => 'required',
		'img_user' => 'required',
        ]);

        User::create([ 
			'nombres' => $this-> nombres,
			'apellidos' => $this-> apellidos,
			'tipo_documento' => $this-> tipo_documento,
			'cedula' => $this-> cedula,
			'email' => $this-> email,
			'img_user' => $this-> img_user,
			'updated_at' => null,
			'borrado' => 0
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'User Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombres = $record-> nombres;
		$this->apellidos = $record-> apellidos;
		$this->tipo_documento = $record-> tipo_documento;
		$this->cedula = $record-> cedula;
		$this->email = $record-> email;
		$this->img_user = $record-> img_user;
		$this->borrado = $record-> borrado;
    }

    public function update()
    {
        $this->validate([
		'nombres' => 'required',
		'apellidos' => 'required',
		'tipo_documento' => 'required',
		'cedula' => 'required',
		'email' => 'required',
		'img_user' => 'required',
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([ 
			'nombres' => $this-> nombres,
			'apellidos' => $this-> apellidos,
			'tipo_documento' => $this-> tipo_documento,
			'cedula' => $this-> cedula,
			'email' => $this-> email,
			'img_user' => $this-> img_user,
			'borrado' => 0
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'User Successfully updated.');
        }
    }

    public function destroy($id)
    {
		if ($id) {
			$record = User::where('id', $id);
			$record->update([
				'borrado' => 1,
			]);
		}
    }
}