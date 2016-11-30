<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_diplomas extends Model
{
    //

    
protected $table ='m_diplomados';
public $fillable=['nombre','apellido_p','apellido_m','correo'];

public $timestamps=false;


   public static function diplomados($iddiplomado){
    	return m_diplomas::where('iddiplomados','=',$iddiplomado)
    	->get();
    }

}
