<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'modulos';

    protected $fillable = ['nombre_modulo','borrado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permisos()
    {
        return $this->hasMany('App\Models\Permiso', 'modulo_id', 'id');
    }
    
}
