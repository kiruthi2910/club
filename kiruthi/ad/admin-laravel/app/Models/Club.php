<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'club'; // since your table is named `club` (singular)
    
    protected $fillable = [
        'club_name', 'logo_path', 'introduction',
        'staff_coordinator', 'staff_email', 'year_start'
    ];

    public $timestamps = false; // because your table has no created_at / updated_at
}
