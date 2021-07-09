<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Students <a href="/add-student" class="btn btn-success">Add new </a>
                        </div>
                        <div class="card-body">

                        @if(Session::has('student_updated'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('student_updated')}} 
                        </div>
                        @endif

                        @if(Session::has('student_deleted'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('student_deleted')}} 
                        </div>
                        @endif

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>ProfileImage<th></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($displayStudents as $student)
                                        <tr>
                                            <td>{{$student->Name}}</td>
                                            <td>{{$student->Email}}</td>
                                            <td><img src="{{asset('images')}}/{{$student->Image}}" style="max-width:60px;"/></td>
                                            <td>
                                                <a href="/edit-student/{{$student->id}}" class="btn btn-info">Edit</a>
                                                <a href="/delete-student/{{$student->id}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
  
    
</body>
</html>