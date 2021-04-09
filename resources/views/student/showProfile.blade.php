

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body class="bg-light">
    <div class="container pt-3">
        
        @include('student/nav-profile')
      
        <h1 class = "text-dark bg-info text-center ">Personal Profile</h1>
       
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <img class="rounded-circle" src="{{ asset('uploads/'. $student->photo) }}" alt="" style=" height:200px; width:200px; float:left; margin-right:25px; margin-bottom:20px;">
                <br>
                <h4>{{ $student->name }}'s Profile</h4>
                <form action="{{ route('student.UpdateProfilePicture') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Update profile image</label><br>
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <input type="file" name="photo"><br><br>
                    <input type="submit" class="btn btn-primary" value="submit">
                </form>
            </div>
            <div class="col-md-12  col-md-offset-1">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4 class="card-title">About {{ $student->name }}</h4>
                        <p class =" card-text font-weight-normal" >{{ $student->skills }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4 class="card-title">Show Other Details</h4>
                        <div class="table-responsive-md">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><label for="id" class="font-weight-bold">ID:</label></td>
                                        <td><p>{{ $student->id }}</p></td>
                                        <td><label for="" class="font-weight-bold">Date of Birth</label></td>
                                        <td><p>{{ $student->birth_date }}</p></td>

                                    </tr>
                                    <tr>
                                        <td><label for="email" class="font-weight-bold">Email:</label></td>
                                        <td><p>{{ $student->email }}</p></td>
                                        <td><label for="Phone Number" class="font-weight-bold">Phone Number</label></td>
                                        <td><p>{{ $student->phone_number }}</p></td>
                                    </tr>
                                    <tr>
                                        <td><label for="university" class="font-weight-bold">University Name:</label></td>
                                        <td><p>{{ $student->university }}</p></td>
                                        <td><label for="department" class="font-weight-bold">Department Name:</label></td>
                                        <td><p>{{ $student->department }}</p></td>
                                    </tr>
                                    <tr>
                                        <td><label for="fname" class="font-weight-bold">Father Name:</label></td>
                                        <td><p>{{ $student->fname }}</p></td>
                                        <td><label for="Addess" class="font-weight-bold">Address:</label></td>
                                        <td><p>{{ $student->address }}</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="logout float-right"> 
                    <p>Logout from profile</p> 
                    <a class='float-right btn btn-info' role='button' href="{{ route('auth.logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
