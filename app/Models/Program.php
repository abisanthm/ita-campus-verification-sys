<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'program_full_name', 'program_short_name', 'program_code'
    ];

    public function programTypes()
    {
        return $this->belongsToMany(ProgramType::class, 'program_programtype');
    }
}
