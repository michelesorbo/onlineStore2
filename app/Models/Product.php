<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function validate($request){
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
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


    public function getName(){
        //$nome_m = strtolower($this->attributes['name']);
        //$nome_m = str_replace($nome_m, ",", " ");
        return $this->attributes['name'];
    }
    public function setName($name){
        $this->attributes['name'] = $name;
    }


    public function getDescription(){
        return $this->attributes['description'];
    }
    public function setDescription($description){
        $this->attributes['description'] = $description;
    }


    public function getImage(){
        return $this->attributes['image'];
    }
    public function setImage($image){
        $this->attributes['image'] = $image;
    }


    public function getPrice(){
        return $this->attributes['price'];
    }
    public function setPrice($price){
        $this->attributes['price'] = $price;
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
