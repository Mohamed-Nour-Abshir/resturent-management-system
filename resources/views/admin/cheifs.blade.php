<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  @include('admin.adminCss')
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
    
    <form action="{{url('/cheifsAdd')}}" method="post" enctype="multipart/form-data">
         @csrf
         <label for="name">Name </label>
         <div class="form-group">
             <input type="text" name="name" class="form-control">
         </div>
         <label for="specialist">specialist</label>
         <div class="form-group">
             <input type="text" name="specialist" class="form-control">
         </div>
         <label for="image">Image</label>
         <div class="form-group">
             <input type="file" name="image" class="form-control">
         </div>

         <button type="submit" class="btn btn-primary">Add Chief</button>

    </form>

    <table class="table table-bordered w-50 h-50 mt-5">
      <thead>
        <tr>
          <th>Cheif Name</th>
          <th>Cheif Specialist</th>
          <th>Cheif Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $data)
         <tr>
           <td>{{$data->name}}</td>
           <td>{{$data->specialist}}</td>
           <td><img src="/CheifsImages/{{$data->image}}" style="width:100px; height:100px;" alt=""></td>
           <td>
             <a href="{{url('/deleteCheif', $data->id)}}" class="btn btn-danger">Delete</a>
             <a href="{{url('/EditCheif', $data->id)}}" class="btn btn-success">Update</a>
           </td>
         </tr>
        @endforeach
        
      </tbody>
    </table>



    </div>
    @include('admin.adminJs')
  </body>

</html>