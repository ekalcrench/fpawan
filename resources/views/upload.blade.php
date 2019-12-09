@extends('layouts.app')
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('failed'))
    <div class="alert alert-alert">
        {{ session()->get('failed') }}
    </div>
@endif
    <div class="container">
        <form action="/upload/create" method="post" enctype="multipart/form-data">
            Upload a File:
            @csrf
            <input type="file" name="myfile" id="fileToUpload" required="required">
            <input type="submit" name="submit" value="Upload File Now" >
        </form>
    </div>
@endsection