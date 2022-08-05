<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
    </head>
  @include('admin.adminCss')
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
    
    <form action="{{url('/UpdateCheif',$data->id)}}" method="post" enctype="multipart/form-data">
         @csrf
         <label for="name">Name </label>
         <div class="form-group">
             <input type="text" name="name" class="form-control" value="{{$data->name}}">
         </div>
         <label for="specialist">specialist</label>
         <div class="form-group">
             <input type="text" name="specialist" class="form-control" value="{{$data->specialist}}">
         </div>
         <label for="image">Image</label>
         <div class="form-group">
             <input type="file" name="image" class="form-control">
         </div>

         <button type="submit" class="btn btn-primary">Update Chief</button>

    </form>
    </div>
    @include('admin.adminJs')
  </body>

</html>