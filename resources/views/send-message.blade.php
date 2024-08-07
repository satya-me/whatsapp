@extends('layouts.master')

@section('title', 'Send Message')

@section('css')
    <style>
        .card {
            margin: 20px 0;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body .form-group {
            margin-bottom: 15px;
        }
        .card-body .form-control {
            background-color: transparent;
        }
        .card-body textarea {
            width: 100%;
            height: 150px;
            margin: 15px 0;
        }
        .card-body input[type="file"] {
            width: 100%;
            margin: 15px 0;
        }
        .dropdown-item {
            color: #495057;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <br><Br>
        <div class="card">
            <div class="card-header">Send Message</div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="session">Session Dropdown</label>
                            <select id="session" name="session" class="form-control">
                                <option value="">Select Session</option>
                                <!-- Add your session options here -->
                            </select>
                        </div>
                        <br>
                        <div class="col-md-4 form-group">
                            <label for="group">Group Drop Down</label>
                            <select id="group" name="group" class="form-control">
                                <option value="">Select Group</option>
                                <!-- Add your group options here -->
                            </select>
                        </div>
                        <br>
                        <div class="col-md-4 form-group">
                            <label for="type">Type Of Message</label>
                            <select id="type" name="type" class="form-control">
                                <option value="">Select Type</option>
                                <!-- Add your message type options here -->
                            </select>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-15 form-group">
                            <label for="message">Enter Your Text</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Enter Your Text"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="file">Upload File</label>
                            <input type="file" id="file" name="file" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">SEND</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
