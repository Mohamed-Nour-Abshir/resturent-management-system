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
    
          
    <form action="{{url('/update', $data->id)}}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
         <label for="title">Title</label>
         <div class="form-group">
           <input type="text" name="title" class="form-controll text-dark" value="{{$data->title}}">
         </div>
         <label for="price">Price</label>
         <div class="form-group">
           <input type="text" name="price" class="form-controll text-dark" value="{{$data->price}}">
         </div>
         <label for="description">Description</label>
         <div class="form-group">
           <input type="text" name="description" class="form-controll text-dark" value="{{$data->description}}">
         </div>
         <label for="title">Old Image</label>
         <div class="form-group">
           <img src="/FoodImages/{{$data->image}}" style="width: 100px; height:100px;" alt="">
         </div>
         <label for="title">Change Image</label>
         <div class="form-group">
           <input type="file" name="image" class="form-controll">
         </div>
         <button class="btn btn-primary form-controll">Upload Food</button>
      </form>

    </div>

    @include('admin.adminJs')
  </body>

</html>