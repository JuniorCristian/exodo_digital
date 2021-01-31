<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Page extends Model
{
    use HasFactory;
    protected $table = 'info_pages';
    protected $primaryKey = 'id_info_pages';
}
