<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class danhmuc extends Model
{
    use HasFactory;
    protected $table = 'DanhMuc';
    public function getAll(){
        $danhmuc = DB::table('DanhMuc')->orderBy('ThuTuHienThi', 'ASC')->get();
        return $danhmuc;
    }
    
    public function addDanhMuc($data)
    {
        // return DB::table('DanhMuc')->insert($data);
    }
    
    public function getDetail($id){
        // return $users = DB::table('DanhMuc')->where('IDDanhMuc', $id)->first();
    }
    
    public function edit($id, $data){
        // return DB::table('DanhMuc')->where('IDDanhMuc', $id)->update($data);
    }
    
    public function deleteDanhMuc($id){
        // return DB::table('DanhMuc')->where('IDDanhMuc', $id)->delete();
    }
    
    public function searchDanhMuc($text){
        // return DB::table('DanhMuc')->where('MaDanhMuc','like','%'.$text.'%')->get();
    }
    

}
