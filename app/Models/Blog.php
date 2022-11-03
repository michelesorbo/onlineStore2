<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public static function validate($request){
        $request->validate([
            "titolo" => "required|max:255",
            "corpo" => "required",
            'image' => 'image',
        ]);
    }

    //Funzioni di get servono a restituire un valore
    public function getId(){
        return $this->attributes['id'];
    }
    //Funzioni set servono asettare il valore di un parametro
    public function setId($id){
        $this->attributes['id'] = $id;
    }


    public function getTitolo(){
        //$nome_m = strtolower($this->attributes['name']);
        //$nome_m = str_replace($nome_m, ",", " ");
        return $this->attributes['titolo'];
    }
    public function setTitolo($titolo){
        $this->attributes['titolo'] = $titolo;
    }


    public function getCorpo(){
        return $this->attributes['corpo'];
    }
    public function setCorpo($corpo){
        $this->attributes['corpo'] = $corpo;
    }


    public function getImage(){
        return $this->attributes['image'];
    }
    public function setImage($image){
        $this->attributes['image'] = $image;
    }


    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($created_at){
        $this->attributes['created_at'] = $created_at;
    }

    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updated_at){
        $this->attributes['updated_at'] = $updated_at;
    }
}
