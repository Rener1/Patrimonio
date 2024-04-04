<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $fillable = ['observacao', 'status' ,'servidor_destino_id', 'servidor_origem_id', 'tipo_movimento_id', 'data_movimento'];

    public function servidor_destino()
{
    return $this->belongsTo('App\Models\Servidor', 'servidor_destino_id');
}


    public function servidor_origem()
    {
        return $this->belongsTo('App\Models\Servidor', 'servidor_origem_id');
    }
    

    public function itens_movimento()
    {
        return $this->belongsToMany(Patrimonio::class, 'movimento_patrimonios', 'movimento_id')
            ->withPivot('id');
    }


    public function tipo_movimento(){
        return $this->belongsTo(TipoMovimento::class);
    }
}
