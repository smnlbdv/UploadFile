
@foreach ($zip as $item)
    <a href="{{url('storage/zipArchives/' . $item->name . '.zip')}}" download>{{$item->name}}</a>
@endforeach
