<!-- View page HTML -->

<!DOCTYPE html>
<html>
<head>
    <title> Retrive data</title>
    <!--<link rel="stylesheet" href="style.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <body class="bg-light">
        <div class="container pt-3" >
            @include('student/nav')
                {{-- <a class='btn-sm btn-secondary' role='button' href='registration'>Registration</a>     --}}
                <h1 class = "text-dark bg-info text-center py-2">All Registered Profile</h1>
               
            <div class="table-responsive text-center">
                <table class="table table-hover table-striped table-bordered">
                    <thead class = "">
                        
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Full Name</th>
                        <th>Show Details</th>
                    </thead>
                    @foreach ($students as $student)
                        <tbody>
                            <tr>
                                <td>{{ $student->created_at->diffForHumans() }}</td>
                                <td>{{ $student->updated_at->diffForHumans() }}</td>
                                <td>{{ $student->name }}</td>
                                <td><a href={{ "showProfile/".$student->id}}><img src="{{ asset('uploads/'. $student->photo) }}" alt="" width="100px" height="100px"> </a></td>
                                
                           
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>   
    </body>
</html>