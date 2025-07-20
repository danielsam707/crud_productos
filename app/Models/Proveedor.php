<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'telefono'];

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
