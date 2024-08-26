<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CertificateSetting;

class CertificateSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CertificateSetting::create([
            'welcome_message' => 'Welcome to our platform!',
            'footer_title' => 'Thank you for using our service',
            'footer_message' => 'This is the footer message.',
            'invalid_title' => 'Invalid Certificate',
            'invalid_message' => 'This certificate is not valid.',
        ]);
    }
}
