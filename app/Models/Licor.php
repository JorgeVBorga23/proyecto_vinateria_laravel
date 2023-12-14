<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;


class Licor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','precio','descripcion',

    ];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "precio" => "required|numeric|gt:0",
            "descripcion"=> "required|max:255",
            "categoria_id"=>"required|numeric|gt:0",
            "imagen" => 'image',
            
        ]);
    }
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getName()
    {
        return $this->attributes['name'];
    }
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    public function getPrecio()
    {
        return $this->attributes['precio'];
    }
    public function setPrecio($name)
    {
        $this->attributes['precio'] = $name;
    }
    public function getDescripcion()
    {
        return $this->attributes['descripcion'];
    }
    public function setDescripcion($name)
    {
        $this->attributes['descripcion'] = $name;
    }

    public function getImagen()
    {
        return $this->attributes['imagen'];
    }
    public function setImagen($name)
    {
        $this->attributes['imagen'] = $name;
    }
    //modificacion para usar relaciones de Eloquent 
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function setCategoriaId($name)
    {
        $this->attributes['categoria_id'] = $name;
    }

}
