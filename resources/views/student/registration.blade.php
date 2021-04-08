<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   
    <title>Registration form </title>
</head>
<body>
    <div class="container pt-3">
        <div class="col-lg ">
            <div class="bg-light">
                <h2 class="text-center text-dark p-3">Registration Form</h2>
                @if (Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                
                @endif
               
                <form class="form-horizontal" action="{{ route('student.add_info') }}" method="POST"  enctype="multipart/form-data">
                    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Full Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="{{ old('name') }}">
                            <span class="text-danger">@error('name') {{ $message }}@enderror</span>
                          </div>  
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
                          <span class="text-danger">@error('email') {{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fanme">Father Name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Father name" value="{{ old('fname') }}">
                          <span class="text-danger">@error('fname') {{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fanme">Phone Number:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
                          <span class="text-danger">@error('phone_number') {{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fanme">Date Of Birth:</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="birth_date" id="fname" placeholder="Enter Father name" value="{{ old('birth_date') }}">
                          <span class="text-danger">@error('birth_date') {{ $message }}@enderror</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fanme">Address:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="address" placeholder="vill ,post_offices ,post_code ,city ,country...." style="height:200px"></textarea>
                          <span class="text-danger">@error('address') {{ $message }}@enderror</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">University:</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="university" name=university>
                            <option value="">Select Option</option>
                            <option value="DUET">DUET</option>
                            <option value="BUET">BUET</option>
                            <option value="DU">DU</option>
                            <option value="RUET">RUET</option>
                            <option value="CUET">CUET</option>
                            <option value="KUET">KUET</option>
                          </select>
                          <span class="text-danger">@error('university') {{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Department:</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="department" name=department>
                            <option value="">Select Option</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="CE">CE</option>
                                <option value="ME">ME</option>
                                <option value="TE">TE</option>
                                <option value="FOOD">FOOD</option>
                          </select>
                          <span class="text-danger">@error('department') {{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="skills">Skills:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="skills" name="skills" placeholder="Write about your skills.." style="height:200px"></textarea>
                            <span class="text-danger">@error('skills') {{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="photo">Photo:</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="photo" name="photo" value="{{ old('photo') }}">
                          <span class="text-danger">@error('photo') {{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class = "form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button class="registerbtn btn btn-primary" type="submit">Submit</button>
                            <a class="registerbtn btn btn-primary" href="{{ route('student.showlist') }}">Show List</a>
                        </div>
                        .
                    </div>
                </form>             
            </div>
        </div>
    </div>
</body>
</html>