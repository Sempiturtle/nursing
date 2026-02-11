<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'thumbnail',
        'category',
    ];

    /**
     * Get the embeddable URL for the video.
     */
    public function getEmbedUrlAttribute()
    {
        $url = $this->url;

        // YouTube
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $match)) {
            return "https://www.youtube.com/embed/" . $match[1];
        }

        // Vimeo
        if (preg_match('/vimeo\.com\/(?:video\/)?([0-9]+)/i', $url, $match)) {
            return "https://player.vimeo.com/video/" . $match[1];
        }

        return $url;
    }
}
