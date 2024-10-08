<?php

namespace App\Models;

use App\Interfaces\Models\IHaveImagesModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Documentation
 *
 * @property int $id
 * @property string $documentable_type
 * @property int $documentable_id
 * @property string $path
 * @property string $original_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereDocumentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereDocumentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Documentation extends Model
{
    use HasFactory;

    const allowed = ['csv', 'xls', 'xlsx' ,'pdf','txt','docx','doc','ppt','pptx'] ;

    public static function getExtensionsImage():array
    {
        return [
            'pdf'=>asset('pdf.png') ,
            'xlsx'=>asset('xlsx.png') ,
            'xls'=>asset('xlsx.png') ,
            'csv'=>asset('csv.png') ,
            'doc'=>asset('doc.png') ,
            'docx'=>asset('docx.png') ,
            'ppt'=>asset('ppt.png') ,
            'pptx'=>asset('ppt.png') ,
            'txt'=>asset('txt.png') ,
        ];

    }

    public static function getExtensionImage(string $extension):string
    {
        return static::getExtensionsImage()[$extension] ;

    }


    protected $guarded = [
        'id'
    ];

    public static function storeDocumentations(Request $request , IHaveImagesModel $model ,  string $dir):void
    {
        $documentations = [];


        foreach ((array) $request->documentations as $documentation)
        {
            $path = $documentation->store('/'.$dir , 'public');

            $documentations[] = ['path' => $path , 'original_name'=>$documentation->getClientOriginalName()];
        }

        if(count($documentations)) {

            $model->documentations()->createMany($documentations);
        }

    }
    public static function updateDocumentations(Request $request , IHaveImagesModel $model ,  $dir  ):void
    {
        if($request->documentations) {

            static::deleteDocumentations($model);
            static::storeDocumentations($request , $model , $dir);

        }


    }

    public static function deleteDocumentations(IHaveImagesModel $model):void
    {
        foreach ($model->documentations->whereNotIn('id',Request('images_not_to_delete.documentation')) as $document)
        {
            if($document->path && file_exists('storage/'.$document->path)) {
                unlink('storage/'.$document->path);
            }
            $document->delete();
        }
    }


    public static function deleteById($id)
    {
        $document = Documentation::where('id',$id)->first();

        if($document) {

            if( $document->path && file_exists('storage/'.$document->path)) {
                unlink('storage/'.$document->path);
            }
            $document->delete();
        }

    }

    public function getName():?string
    {
        return $this->original_name  ;
    }

    public function getFileImage():string
    {
        return static::getExtensionImage($this->getExtension());
    }
    public function getExtension()
    {
        $explodeName = explode('.',$this->getName()) ;

        return $explodeName[count($explodeName)-1];
    }


}
