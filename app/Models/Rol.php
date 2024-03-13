<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'rols';

    protected $fillable = ['nombre_rol','borrado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permisos()
    {
        return $this->hasMany('App\Models\Permiso', 'rol_id', 'id');
    }
    
}
