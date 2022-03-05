<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivasi extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = "motivasi";

    protected $fillable = ['isi', 'user_id'];


    public function user()
    {
        # code...
        return $this->belongsTo(User::class, 'user_id');
    }
}
