<x-app-layout>
 
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>  

  <div class="container-scroller">

  @include('admin.navbar')
        <div style="position: relative; top: 60px; right:-160px;">
            <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">

            @csrf



                <div>
                    <label>Title</label>
                    <input type="text" style="color:blue;" name="title" placeholder="Write a title" required>
                </div><br>
                <div>
                    <label>Price</label>
                    <input type="num"  style="color:blue;" name="price" placeholder="Write a price" required>
                </div><br>
                <div>
                    <label>Image</label>
                    <input type="file" name="image"  required>
                </div><br>
                <div>
                    <label>Discription</label>
                    <input type="text"  style="color:blue;" name="disc" placeholder="Write a Discription" required>
                </div><br>
                <div>
                    <input style="color:black;" type="submit" value="Submit">
                </div><br>
            </form>


            <div>
                <table>
                    <tr bgcolor="black">
                        <th style="padding: 30px;">Food Name</th>
                        <th style="padding: 30px;">Price</th>
                        <th style="padding: 30px;">Description</th>
                        <th style="padding: 30px;">image</th>
                        <th style="padding: 30px;">Action</th>
                        <th style="padding: 30px;">Action2</th>
                    </tr>


                        @foreach($data as $data)
                    <tr align="center">
                        <td>{{$data->title}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->disc}}</td>
                        <td><img height="200px;" width="200px;" src="/foodimage/{{$data->image}}" alt=""></td>
                        <td><a href="{{url('/deletemenu',$data->id)}}">Delete</a></td>
                        <td><a href="{{url('/updateview',$data->id)}}">Update</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>


        </div>
    
  </div>
@include('admin.adminscript');
   
  </body>
</html>