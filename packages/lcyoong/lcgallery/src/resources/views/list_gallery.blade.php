<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>{{trans('lcgallery::gallery.gal_id')}}</td>
                    <td>{{trans('lcgallery::gallery.gal_name')}}</td>
                    <td>{{trans('lcgallery::gallery.gal_status')}}</td>
                    <td>{{trans('general.action')}}</td>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $item)
            <tr>
                <td>{{$item->gal_id}}</td>
                <td>{{$item->gal_name}}</td>
                <td>{{$item->gal_status}}</td>
                <td>
                    <a href="{{url($uprefix . 'gallery/edit/' . $item->gal_id)}}"><i class="fa fa-edit"></i></a>
                    <a href="{{url($uprefix . 'gallery/pic/list/' . $item->gal_id)}}"><i class="fa fa-picture-o"></i></a>
                </td>
            </tr>
            @endforeach                        
            </tbody>
        </table>
    </div>
</div>