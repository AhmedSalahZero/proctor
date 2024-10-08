<?php

namespace App\Observers;

use App\Models\Media ;

class MediaObserver
{
    public function deleting(Media $media)
    {
        $media->users()->update([
            'media_id'=>Media::OTHER_MEDIA_ID
        ]);

    }
}
