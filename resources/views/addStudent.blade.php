<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add New Student
                        </div>
                        <div class="card-body">

                        @if(Session::has('student_added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('student_added')}} 
                        </div>
                        @endif

                        
                        
                            <form method = "Post" action = "{{route('student.create')}}" enctype = "multipart/form-data">
                            @csrf
                            
                            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} ">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" name="name"  value="{{old('name')}}" class="form-control"/>
                            </div>
                            
                            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}} ">
                                <label for="email">Email</label>
                                <input type="text" name="email"  class="form-control"/>
                            </div>
                            
                            <div class="form-group {{$errors->has('file') ? 'has-error' : ''}} ">
                                <label for="file">Choose Profile Image</label>
                                <input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
                                <img id="previewImg" alt="profile image" style="max-width:130px;margin-top:20px"/>
                            </div>

                            <!-- @if ($errors->has('name'))
                            <span class="help-block" >
                                {{$errors->first('name')}}
                            </span>
                            @endif -->

                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>