<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  @include('admin.adminCss')
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
      
     <form action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data" class="mt-5">
      @csrf
       <label for="title">Title</label>
       <div class="form-group">
         <input type="text" name="title" class="form-controll text-dark">
       </div>
       <label for="price">Price</label>
       <div class="form-group">
         <input type="text" name="price" class="form-controll text-dark">
       </div>
       <label for="description">Description</label>
       <div class="form-group">
         <input type="text" name="description" class="form-controll text-dark">
       </div>
       <label for="title">Image</label>
       <div class="form-group">
         <input type="file" name="image" class="form-controll">
       </div>
       <button class="btn btn-primary form-controll">Upload Food</button>
    </form>


       <table class="table table-bordered w-50 h-50 mt-5">
         <thead>
           <tr>
             <th>Food Name</th>
             <th>Food Price</th>
             <th>Food Detail</th>
             <th>Food Image</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           @foreach ($data as $data)
            <tr>
              <td>{{$data->title}}</td>
              <td>${{$data->price}}</td>
              <td>{{$data->description}}</td>
              <td><img src="/FoodImages/{{$data->image}}" style="width:100px; height:100px;" alt=""></td>
              <td>
                <a href="{{url('/deleteFood', $data->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{url('/UpdateFood', $data->id)}}" class="btn btn-success">Update</a>
              </td>
            </tr>
           @endforeach
           
         </tbody>
       </table>

    </div>
    @include('admin.adminJs')
  </body>

</html>