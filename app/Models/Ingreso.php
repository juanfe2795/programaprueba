<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'ingresos';

    protected $fillable = ['nombre_ingreso','concepto','valor', 'empresas_id', 'borrado'];
	
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empresas()
    {
        return $this->hasMany('App\Models\empresas', 'empresas_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ahorros()
    {
        return $this->hasMany('App\Models\Ahorro', 'ingresos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudas()
    {
        return $this->hasMany('App\Models\Deuda', 'ingresos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function egresos()
    {
        return $this->hasMany('App\Models\Egreso', 'ingresos_id', 'id');
    }
    
}
