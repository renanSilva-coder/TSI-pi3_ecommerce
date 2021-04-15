<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['name','description','price','category_id','image'];

    //relação muitos para um
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    //ralação muitos para muitos 
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
