<x-app-layout>
 
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
   @include('admin.admincss')
  </head>
  <body>
  <div class="container-scroller">
    
  @include('admin.navbar');
<form action="{{url('/updatefoodchef',$data->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Chef Name</label>
  <input type="text" style="color: blue;" name="name" placeholder="Chef name" value="{{$data->name}}">
  <label>Chef Speciality</label>
  <input type="text" style="color: blue;" name="special" placeholder="Chef Speciality" value="{{$data->special}}">
  <label>Old Image</label>
 <img height="200px" width="200px" src="/chefimage/{{$data->image}}" alt="">
  <label>New Image</label>
<input type="file" name="image">
<input type="submit" style="color: blue;" value="Updated Chef" required>
</form>

  </div>
  @include('admin.adminscript');

  </body>
</html>