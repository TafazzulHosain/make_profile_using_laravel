<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class studentController extends Controller
{
    // Authantication section
    function login()
    {
        return view('auth.login');
    }
    function user_register()
    {
        return view('auth.register');
    }
    ///To register
    public function save_user(Request $req)
    {
        ////validation
        $req->validate([

            'name' => 'required',
            'email' =>'required|email|unique:logins',
            'password' =>'required|min:5|max:12'
        ]);
        ///insert into database
        $data = new Login;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        $query=$data->save();

        if($query)
        {
            return back()->with('success' , 'Insert Successfully!');
        }
        else
        {
            return back()->with('fail','Insertion problem!');
        }
    }
    ///Check valid user or not
    public function check_user(Request $req)
    {
        $req->validate([

            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        ///check email and password
        $info = Login::where('email','=',$req->email)->first();
        if(!$info)
        {
            return back()->with('fail','Your have no account!');
            
        }
        else
        {
            if(Hash::check($req->password,$info->password))
            {
                $req->session()->put('logged',$info->id);
                return redirect('student/registration');
            }
            else
            {
                return back()->with('fail','Incorrect password!');
            }
        }

    }
    ///Session Destroy 
    public function logout()
    {
        if(session()->has('logged'))
        {
            session()->pull('logged');
            return redirect('/auth/login');
        }
    }



    

    ///student information Section

    function registration()
    {
        $data = ['loggedinfo'=>Login::where('id','=',session('logged'))->first()];  ///Problem 
        return view('student.registration');

    }
    ///Inster student information in database

    public function add_info(Request $req)
    {
        //Registration  form validation
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'fname' => 'required',
            'phone_number'=>'required',
            'birth_date'=>'required',
            'address'=>'required',
            'university' =>'required',
            'department' => 'required',
            'skills' => 'required|min:10|max:1000',
            'photo' => 'required|mimes:jpg,png,jpeg|max:5048'  

        ]);

        ///For uploading image and store a folder
        $newImageName = time().'-'.$req->name.'.'.$req->photo->extension();
        $req->photo->move(public_path('uploads'),$newImageName);
        //Insert into databse
        $student = new Student;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->fname = $req->fname;
        $student->phone_number = $req->phone_number;
        $student->birth_date = $req->birth_date;
        $student->address = $req->address;
        $student->university = $req->university;
        $student->department = $req->department;
        $student->skills = $req->skills;
        $student->photo = $newImageName;
        $query = $student->save();
        if($query)
        {
            return back()->with('success' , 'Insert Successfully!');
        }
        else
        {
            return back()->with('fail','Insertion problem!');
        }

    }
    ///To view all database entries
    public function showlist()
    {
        $data = Student::all();

        return view('student.showlist')->with('students',$data);

    }
    ///To show individual profile
    public function showProfile($id)
    {
        $data = Student::find($id);
        // $data = Student::where('id','=',$id->first());
        return view('student.showProfile')->with('student',$data);
    }

    ///update a profile form
    function showForUpadate($id)
    {
        $data = Student::find($id);
        return view('student.showForUpdate')->with('student',$data);
    }
    ///Execute update funtionality
    public function UpdateInfo(Request $req)
    {
        
        

        $data = Student::find($req->id);
        //Registration  form validation
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'fname' => 'required',
            'university' =>'required',
            'department' => 'required',
            'skills' => 'required|min:10|max:1000'
        ]);

        $data->name = $req->name;
        $data->email = $req->email;
        $data->fname = $req->fname;
        $data->university = $req->university;
        $data->department = $req->department;
        $data->skills = $req->skills;
        $query = $data->save();
        if($query)
        {
            return redirect('student/showlist')->with('success' , 'Update Successfully!');
        }
        else
        {
            return back()->with('fail','Problem in update!');
        }

    }
    public function UpdateProfilePicture(Request $req)
    {
        $data = Student::find($req->id);
        $newImageName = time().'-'.$req->name.'.'.$req->photo->extension();
        $req->photo->move(public_path('uploads'),$newImageName);
        $data->photo = $newImageName;
        $data->save();
        return back();

    }

    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect('student/showlist');

    }


}
