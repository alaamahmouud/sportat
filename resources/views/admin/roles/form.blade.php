
{!! \App\MyHelper\Field::text('name' , 'الاسم ' ) !!}



<div class="row">
    @foreach($permissions as $permission)

    @php 
    $prs = Spatie\Permission\Models\Permission::where('group', $permission->group)->get();

    @endphp
    <div class="col-md-4">
        <div class="col-md-12">
            @foreach($prs as $p)
            <li class="list-group-item">
                <input type="checkbox" name="permissions[]" value="{{$p->id}}">{{ $p->name }}
            </li>
            @endforeach
        </div>
    </div>
    @endforeach
  
</div>


