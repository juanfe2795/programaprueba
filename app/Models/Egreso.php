<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'egresos';

    protected $fillable = ['nombre_egreso','concepto','valor','ingresos_id','borrado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ingreso()
    {
        return $this->hasOne('App\Models\Ingreso', 'id', 'ingresos_id');
    }
    
}
