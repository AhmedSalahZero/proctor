<?php
namespace App\Models\Traits ;
use Illuminate\Support\Str;

Trait HasImage
{

    public static function boot()
    {
        parent::boot();
        static::deleting(function($model){
            $model->deleteOldImage();
        });
    }


    public function getImagePath()
    {

        if(Request()->hasFile('image')){
            $this->deleteOldImage();
            return Request()->file('image')->store(Str::plural($this->getModelName()) , 'public');
        }
        return $this->image ;
    }

    private function deleteOldImage()
    {
        $path = $this->getFilePath() ;

        if($this->image && file_exists($path) )
        {
            unlink($path);
        }

    }

    private function getFilePath():string
    {
        return 'storage/'.$this->image ;
    }

    private function getModelName():string
    {
        $classNameParts = explode('\\',get_class());

        return (array_pop($classNameParts));
    }


}
