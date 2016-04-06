<?php

namespace Lcyoong\Lcgallery\Http\Controllers;
use App\Http\Controllers\BaseController;
use Auth;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\File;
use Lcyoong\Lcgallery\Gallery;
use Lcyoong\Lcgallery\Picture;
use App\Helpers\General;
use App\GeneralParameter;

class LcgalleryController extends BaseController
{
    private $repo_gal;
    private $repo_pic;
    public function __construct()
    {
        parent::__construct();
		$this->def_options['active'] = ['lcgallery'];
        $this->repo_gal = new Gallery;
        $this->repo_pic = new Picture;
        $this->def_options['owner'] = Auth::user()->id;
        $this->def_options['layout'] = config('config.layout');
    }

    public function addGallery($owner)
    {
        $options = ['owner'=>$owner,
                    'return_link' => url(config('lcgallery.prefix') . 'gallery/list/' . $owner),
                    'return_text' => trans('lcgallery::gallery.list'),
                    'title' => trans('lcgallery::gallery.add'),];
        $options += $this->def_options;
        return view(config('lcgallery.view_gallery_add'), $options);
    }

    public function editGallery($id)
    {
        $gp = new GeneralParameter;
        $data = $this->repo_gal->find($id);
        $options = ['data'=>$data,
                    'return_link' => url(config('lcgallery.prefix') . 'gallery/list/' . $data->gal_owner),
                    'return_text' => trans('lcgallery::gallery.list'),
                    'title' => trans('lcgallery::gallery.edit'),
                    'dd_status'=>$gp->getByType('pro_status'),
                    'right_panel' => 'lcgallery::edit_gallery_info',];
        $options += $this->def_options;
        return view(config('lcgallery.view_gallery_edit'), $options);
    }

    public function storeGallery(Request $request)
    {
        if ($request->hasFile('gal_path') && $request->file('gal_path')->isValid()) {
            $file = $request->file('gal_path');
            $filename = $file->getClientOriginalName();
            $upload_success = Storage::disk('local')->put('images/' . array_get($input, 'gal_owner') . '/'. $filename, File::get($file));
            $request->file('photo')->move($destinationPath);
        }
        $this->repo_gal->store($request->all());
        return General::jsonGoodResponse();
    }

    // $gal_id is gallery id
    public function addPicture($gal_id)
    {
        $gallery = $this->repo_gal->find($gal_id);
        $options = ['gallery' => $gallery];
        $options = $this->def_options;
        return view('lcgallery::add_picture', $options);
    }

    // Insert or update picture
    public function storePicture(Request $request)
    {
        $this->repo_pic->store($request->all());
        return General::jsonGoodResponse();
    }

    // $id is picture id
    public function unstorePicture($id)
    {
        $result = $this->repo_pic->unstore($id);
        return General::jsonGoodResponse();
    }

    // $owner is user id (owner)
    public function listGallery($owner = 0)
    {
        if ($owner == 0) {
            $owner = $this->def_options['owner'];
        }
        $options = ['title' => trans('lcgallery::gallery.list'),
                    'create_link' => url(config('lcgallery.prefix') . 'gallery/add/' . $owner),
                    'datas' => $this->repo_gal->listByOwner($owner)];
        if (Auth::user()->hasRole('super_admin')) {
            $options += [
                    'return_link' => url($this->def_options['uprefix'] . 'biz'),
                    'return_text' => trans('biz.listing'),
                    ];
        }
        $options += $this->def_options;
        // return view('lcgallery::listing', $options);
        return view(config('lcgallery.view_gallery_list'), $options);
    }

    // $id is gallery id
    public function listPictures($id)
    {
        $repo_pic = new Picture;
        $gal = $this->repo_gal->find($id);
        $options = ['datas' => $repo_pic->listGalleryPictures($id, config('lcgallery.thumbs_per_page')),
                    'return_link' => url(config('lcgallery.prefix') . 'gallery/list/' . $gal->gal_owner),
                    'return_text' => trans('lcgallery::gallery.list'),
                    'title' => trans('lcgallery::picture.add'),
                    'js_path' => 'lcgallery::dropzone',
                    'gallery'=>$gal];
        $options += $this->def_options;
        // return view('lcgallery::listing', $options);
        return view(config('lcgallery.view_picture_list'), $options);
    }

    public function upload (Request $request)
    {
        $file = $request->file('file');
        $input = $request->all();
        //$filename =  "profile.".$extension;
        $filename = $file->getClientOriginalName();

        //$upload_success = Input::file('file')->move($directory, $filename);
        $upload_success = Storage::disk('local')->put('images/gallery/' . array_get($input, 'pic_gallery') . '/'. $filename, File::get($file));
        if ($upload_success) {
            $doc = array('pic_gallery' => array_get($input, 'pic_gallery'), 'pic_path' => $filename);
            $this->repo_pic->store($doc);
        }

    }

    public function editPicture($id)
    {
        $gp = new GeneralParameter;
        $data = $this->repo_pic->find($id);
        $options = ['data'=>$data,
                    'title' => trans('lcgallery::gallery.edit'),
                    'dd_status'=>$gp->getByType('pro_status'),
                    'right_panel' => 'lcgallery::edit_picture',];
        $options += $this->def_options;
        return view(config('lcgallery.view_picture_edit'), $options);
    }

}
