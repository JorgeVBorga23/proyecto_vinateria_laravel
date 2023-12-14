<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Ventas extends Model
{
    use HasFactory;
    public static function validate($request)
    {
        $request->validate([
            "user_id" => "required|numeric|gt:0",
            "licor_id" => "required|numeric|gt:0",
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function setIdUser($id)
    {
        $this->attributes['user_id'] = $id;
    }

    public function licor()
    {
        return $this->belongsTo(Licor::class);
    }
    public function setIdLicor($id)
    {
        $this->attributes['licor_id'] = $id;
    }

}
