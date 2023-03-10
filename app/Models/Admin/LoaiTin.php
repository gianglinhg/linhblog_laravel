<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class LoaiTin extends Model
{
    use HasFactory;
    public function getAllLoaiTin(){
        return DB::select("SELECT * FROM loaitin");
    }
    public function addTin($data){
        DB::insert('INSERT INTO loaitin (ten, thutu,anHien,created_at) VALUES (?,?,?,?)', $data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM loaitin WHERE id = ?', [$id]);
    }
    public function updateTin($data, $id){
        $data[] = $id;
        return DB::update('UPDATE loaitin SET ten = ?, thuTu = ?,anHien =?, updated_at = ?  WHERE id = ?', $data);
    }
    public function deleteTin($id){
        return DB::delete('DELETE FROM loaitin WHERE id = ?', [$id]);
    }
}
