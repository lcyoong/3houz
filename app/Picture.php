<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Storage;

class Picture extends Model
{
    protected $table = 'picture';
    protected $primaryKey = 'pic_id';
    protected $fillable = ['pic_proprietor', 'pic_path', 'pic_thumbnail_path', 'pic_description', 'pic_created_by'];

    protected $baseDir = 'property/pictures/';

    public static function named($name)
    {
        return (new static)->saveAs($name);
    }

    protected function saveAs($name)
    {
        $this->pic_path = sprintf('%s-%s', time(), $name);

        $this->pic_thumbnail_path = sprintf('tn-%s', $this->pic_path);

        return $this;
    }

    public function move(UploadedFile $file)
    {
        Storage::disk('local')->put($this->baseDir . $this->pic_path, File::get($file));

        $img = Image::make(storage_path('app/'.$this->baseDir . $this->pic_path));

        if ($img->height() > 430) {
          $img->heighten(430);
        }

        $img->resizeCanvas(848, 430, 'center', false, '000000');
        // $img->fit(848, 430, function ($constraint) {
        //     $constraint->upsize();
        // });

        // $watermark = Image::make(asset('img/watermark.png'));
        //
        // $img->insert($watermark, 'bottom-right', 20, 20);

        $img->save(storage_path('app/'.$this->baseDir . $this->pic_path));

        // $img->resize(848, null, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // })->save(storage_path('app/'.$this->baseDir . $this->pic_path));

        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make(storage_path('app/'.$this->baseDir . $this->pic_path))->fit(800, 600)->save(storage_path('app/'.$this->baseDir . $this->pic_thumbnail_path));
    }
}
