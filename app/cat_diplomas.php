<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cat_diplomas extends Model
{
    //
    protected $table ='cat_diplomas';
public $fillable=['Concepto','fecha','Motivo'];
protected $primaryKey='idDiplomas';
public $timestamps=false;

}
