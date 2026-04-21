<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

trait ImageProcessing
{
    /**
     * Process and upload image to storage as WebP.
     *
     * @param UploadedFile $file
     * @param string $path
     * @return string URL to the saved image
     */
    protected function uploadAndProcessImage(UploadedFile $file, $path = 'uploads')
    {
        // Generate random filename
        $filename = Str::random(40) . '.webp';
        $fullPath = $path . '/' . $filename;

        // Initialize ImageManager with GD driver
        $manager = new ImageManager(new Driver());

        // Read image from file
        $image = $manager->read($file);

        // Scale down if width > 1200px to save space
        if ($image->width() > 1200) {
            $image->scale(width: 1200);
        }

        // Encode to webp with 80% quality
        $encoded = $image->toWebp(80);

        // Save to public storage
        Storage::disk('public')->put($fullPath, (string) $encoded);

        // Return URL
        return Storage::url($fullPath);
    }
}
