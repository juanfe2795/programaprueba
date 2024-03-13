<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'empresas';

    protected $fillable = ['nombre_empresa','fecha_inicio_contrato','fecha_fin_contrato','valor_contrato','pago_mensual','borrado'];
	
}
