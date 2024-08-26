<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramType extends Model
{
    protected $fillable = ['name'];

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_programtype');
    }
}
