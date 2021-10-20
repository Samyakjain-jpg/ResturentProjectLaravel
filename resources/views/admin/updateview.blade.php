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



@include('admin.navbar')
      <div style="position: relative; top: 60px; right:-160px;">
          <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">

          @csrf



              <div>
                  <label>Title</label>
                  <input type="text" style="color:blue;" name="title" value="{{$data->title}}" required>
              </div><br>
              <div>
                  <label>Price</label>
                  <input type="num"  style="color:blue;" name="price" value="{{$data->price}}" required>
              </div><br>
              <div>
                  <label>Discription</label>
                  <input type="text"  style="color:blue;" name="disc" value="{{$data->disc}}" required>
              </div><br>
              <div>
                  <label>Old Image</label>
                <img height="200px;" width="200px;" src="/foodimage/{{$data->image}}" alt="">
              </div><br>
              <div>
                  <label>New Image</label>
                  <input type="file" name="image"  required>
              </div><br>
              <div>
                  <input style="color:black;" type="submit" value="update">
              </div><br>
          </form>


          <div>
  </div>
  @include('admin.adminscript');
   
  </body>
</html>