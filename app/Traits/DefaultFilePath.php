<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait DefaultFilePath 
{
    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
    
    /**
     * This function is used for deleting the previous image.
     * while uploading the new image of user profile
     *
     *
     */
    protected function deletepreviousImage($previous)
    {
        Storage::disk($this->profilePhotoDisk())->delete($previous);
    }
    
    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4AA';
    }
}