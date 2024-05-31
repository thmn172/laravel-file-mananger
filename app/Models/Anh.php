<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Anh extends Model
{
    use HasFactory;
    protected $table = 'anh';
    
    public function add($data){
        return DB::table('anh')->insert($data);
    }
}
