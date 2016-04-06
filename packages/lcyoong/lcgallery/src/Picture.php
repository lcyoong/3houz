<?php

namespace Lcyoong\Lcgallery;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'picture';
    protected $primaryKey = 'pic_id';
    protected $fillable = ['pic_gallery', 'pic_description', 'pic_path', 'pic_status', 'pic_created_by'];

    public function store($input)
    {
        // validation
        $rules = [
            'pic_gallery' => 'required|exists:gallery,gal_id',
            'pic_description' => 'max:255',
            'pic_path' => 'required',
        ];
        if (array_get($input, 'pic_id')) {
            $instance = Picture::find(array_get($input, 'pic_id'));
            $instance->fill($input);
            $instance->exists = true;
        } else {
            $input['pic_status'] = 'active';
            $instance = new Picture($input);
        }
        $this->validate($instance->attributes, $rules);

        return $instance->save();
    }

    public function listGalleryPictures($id, $paginate = 15)
    {
        $query = $this->select($this->table.'.*')
                    ->where('pic_gallery', '=', $id);
        return $paginate > 0 ? $query->paginate($paginate) : $query->get();
    }

    public function getLatestByBiz($id, $limit = 15)
    {
        $query = $this->select($this->table.'.*')
                    ->join('gallery', 'gal_id', '=', 'pic_gallery')
                    ->where('gal_owner', '=', $id)->orderBy('pic_id', 'desc');
        return $query->take($limit)->get();
    }

    public function unstore($id)
    {
        $query = $this->find($id);
        return $query->delete();
    }
}
