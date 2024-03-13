<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'deudas';

    protected $fillable = ['nombre_deuda','concepto','valor','pagado','fecha_pago','valor_abono','info_abono','fecha_abono','ingresos_id','borrado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ingreso()
    {
        return $this->hasOne('App\Models\Ingreso', 'id', 'ingresos_id');
    }
    
}
