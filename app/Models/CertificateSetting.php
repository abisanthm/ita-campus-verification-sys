<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'welcome_message',
        'footer_title',
        'footer_message',
        'invalid_title',
        'invalid_message',
        // Add other fillable fields here if needed
    ];
}
