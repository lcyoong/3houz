<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests;
use App\Traits\ControllerTrait;
use App\Property;
use App\Picture;
use App\Http\Requests\AddPropertyPicture;
use App\Http\Requests\EditPropertyPicture;
use Auth;

class PropertyPictureController extends Controller
{
    use ControllerTrait;

    protected $pictureRepo;

    public function __construct(Picture $pictureRepo)
    {
        $this->pictureRepo = $pictureRepo;
    }

    public function create(Property $prop)
    {
        $page_title = trans('property.title_pictures');

        $go_back = 'property';

        $this->authorize('update', $prop);

        return view('property_picture.create', compact('page_title', 'prop', 'go_back'));
    }

    public function store(AddPropertyPicture $request)
    {
        $picture = $this->makePicture($request->file('picture'));

        Property::find($request->input('prop_id'))->addPicture($picture);
    }

    protected function makePicture(UploadedFile $file)
    {
        return Picture::named($file->getClientOriginalName())->move($file);
    }

    public function edit(Picture $picture)
    {
        return view('property_picture.edit', compact('picture'));
    }

    public function update(EditPropertyPicture $request)
    {
        $this->pictureRepo->find($request->input('pic_id'))->update($request->all());

        return redirect()->back()->with('status', trans('common.save_successful'));
    }

    public function destroy(Picture $request)
    {
        $request->delete();

        return redirect()->back()->with('status', trans('common.delete_successful'));
    }
}
