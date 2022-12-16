<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $table = 'visits';
    protected $fillable = ['ip_address','date_visitors'];
}
