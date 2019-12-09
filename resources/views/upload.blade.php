@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/upload/create" method="post" enctype="multipart/form-data">
            Upload a File:
            @csrf
            <input type="file" name="myfile" id="fileToUpload" required="required">
            <input type="submit" name="submit" value="Upload File Now" >
        </form>
    </div>
@endsection