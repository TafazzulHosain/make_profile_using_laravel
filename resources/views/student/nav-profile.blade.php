<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
    <!-- Links -->
    <ul class="navbar-nav ">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('student.registration') }}">Registration</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('student.showlist') }}">Show list</a>

        </li>
        <li class="nav-item active">
            <a class="nav-link" href={{ "/student/showForUpdate/".$student->id }}>Edit Profile</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href={{ "/student/delete/".$student->id }}>Delete Profile</a>
        </li>
    </ul>
  
  </nav>