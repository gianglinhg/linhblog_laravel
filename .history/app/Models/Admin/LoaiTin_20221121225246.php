<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    use HasFactory;
    protected $table = 'loaitin';
    // protected $primari
    protected $fillable = [
        'id',
        'ten',
    ];
}
