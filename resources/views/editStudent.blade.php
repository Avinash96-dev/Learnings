<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Edit Student
                        </div>
                        <div class="card-body">

                        
                            <form method = "Post" action = "{{route('student.create')}}" enctype = "multipart/form-data">
                            @csrf
                            
                            <input type ="hidden" name="id" value="{{$editStudent->id}}"/>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name"  value = "{{$editStudent->Name}}" class="form-control"/>
                                <span class="help-block" style="color:red"> @error('name'){{$message}}@enderror </span>                           
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{$editStudent->Email}}" class="form-control"/>
                                <span class="help-block" style="color:red"> @error('email'){{$message}}@enderror </span>                           
                            </div>
                            
                            <div class="form-group">
                                <label for="filr">Choose Profile Image</label>
                                <input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
                                <span class="help-block" style="color:red"> @error('file'){{$message}}@enderror </span>                           
                                <img id="previewImg" alt="profile image" src="{{asset('images')}}/{{$editStudent->Image}}" style="max-width:130px;margin-top:20px"/>
                            </div>
                            
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