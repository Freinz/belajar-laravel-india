<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
</head>
<body>

    <h1>Update Page</h1>

    <!-- {{$student->name}}
    {{$student->email}}
    <img width="100px" src="/student/{{$student->image}}" alt=""> -->
    
    <form action="{{url('update',$student->id)}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div>
            <label for="">Student Name</label>
            <input type="text" name="name" value="{{$student->name}}">
        </div>
       
        <div>
            <label for="">Student Email</label>
            <input type="text" name="email" value="{{$student->email}}">
        </div>
      
        <div>
            <label for="">Old Image</label>
            <img width="100px" src="/student/{{$student->image}}" alt="">
        </div>
        
        <div>
            <label for="">Change the Image</label>
            <input type="file" name="file">
        </div>
        
        <div>
            <input type="submit" value="Update">
        </div>


    </form>

</body>
</html>