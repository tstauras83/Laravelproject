<a href="{{route($mainRoute . '.edit', $model->id)}}" class="btn btn-primary">Edit</a>
<form action="{{route($mainRoute . '.destroy', $model->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
