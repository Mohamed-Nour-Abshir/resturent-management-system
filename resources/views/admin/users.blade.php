<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  @include('admin.adminCss')
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
    <div class="text-center mr-5">
        <table class="table table-bordered w-50 h-50 mt-5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="color: white;">
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->usertype == '0')
                    <td><a href="{{url('/deleteuser',$user->id)}}" class="btn btn-danger">Delete</a></td>
                    @else
                    <td><a class="btn btn-danger disabled">Delete</a></td>
                    @endif
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    </div>
    @include('admin.adminJs')
  </body>

</html>