<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'documentable_type',
        'documentable_id',
        'file_name',
        'mime_type',
        'file_path',
    ];

    public function documentable()
    {
        return $this->morphTo();
    }

    public function imageUrl() 
    {
        return $this->file_path 
            ? asset('storage/'.$this->file_path)
            : '';
    }

    public function fileType()
    {
        // $value = Str::of($this->mime_type)->match('/image/');
        $value = Str::startsWith($this->mime_type, 'image');
        if ($value == "image") {
            return true;
        }
    }
}
