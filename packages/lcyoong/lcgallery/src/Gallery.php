<?php

namespace Lcyoong\Lcgallery;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;

class Gallery extends BaseModel
{
    //
    protected $table = 'gallery';
	protected $primaryKey = 'gal_id';
    protected $fillable = ['gal_owner', 'gal_name', 'gal_order', 'gal_status', 'gal_path'];

    public function store($input)
    {
            // validation
            $rules = [
                'gal_owner' => 'required|exists:users,id',
                'gal_name' => 'required|max:255',
            ];
            if (array_get($input, 'gal_id')) {                
                $instance = Gallery::find(array_get($input, 'gal_id'));
                $instance->fill($input);
                // $instance->updated_by = Auth::user()->id;
                $instance->exists = true;
            }else {
                $input['gal_status'] = 'active';                
                $instance = new Gallery($input);
            }
            $this->validate($input, $rules);            
            
            return $instance->save();
        try {
        } catch (\Exception $e) {
            return false;
        }
        
    }

    public function listByOwner($owner, $paginate = 15)
    {
        $query = $this->select($this->table.'.*')->where('gal_owner', '=', $owner);
        return $paginate > 0 ? $query->paginate($paginate) : $query->get();
    }

}
