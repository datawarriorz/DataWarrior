
@extends('layout.mainlayout')

@section('content')

<link rel="stylesheet" href="./css/profilelayout.css">
<div class="sidenav">
    <a href="/profile">Personal Details</a>
    <a href="/qualification">Qualification</a>
    <a href="/skills">Skills</a>
    <a href="/jobexperience">Experience</a>
    
  </div>
  
  <div class="container">
@yield('profilecontent')

  </div>
  
 

@endsection



