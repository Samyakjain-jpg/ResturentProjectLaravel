<x-app-layout>
 
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>

  
  <div class="container-scroller">
    
  @include('admin.navbar');



    <h1>Admin Chef</h1>

    <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter name" style="color: blue;" required>

            <label>Speciallity</label>
            <input type="text" name="special" placeholder="Enter Speciality" style="color: blue;" required>

            <input type="file" name="image" required>

        </div>
      <div>
          <input type="submit" style="color: blue;" value="save">
      </div>
    </form>

    <div>
    <table bgcolor="black">
      <tr>
        <th style="padding:30px;">Name</th>
        <th style="padding:30px;">Speciality</th>
        <th style="padding:30px;">Image</th>
        <th style="padding:30px;">Action</th>
      </tr>

      @foreach($data as $data)
      <tr align="center">
        <td>{{$data->name}}</td>
        <td>{{$data->special}}</td>
        <td><img height="200px;" width="200px;" src="/chefimage/{{$data->image}}" alt=""></td>
        <td><a href="{{url('/deletechef',$data->id)}}">Delete</a></td>
        <td><a href="{{url('/updatechef',$data->id)}}">Update</a></td>
      </tr>
      @endforeach
    </table>
  </div>

  </div>

 
  @include('admin.adminscript');
   
  </body>
</html>