@extends('layouts.master')

@section('css')
@endsection

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <iconify-icon icon="material-symbols:supervisor-account-outline" width="30" height="30" style="color: #15a362;"></iconify-icon>
                            </div>
                        </div>
                        <div class="col-auto">
                            <h4 class="app-card-title">Contact</h4>
                        </div>
                    </div>
                </div>
                <form class="auth-form login-form is-readonly" action="{{ route('admin.store_contact') }}" method="POST">
                    @csrf
                    <div class="app-card-body px-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="email mb-3">
                                    <label class="lable_style" for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" required>
                                </div>
                                <div class="email mb-3">
                                    <label class="lable_style" for="country_code">Country Code</label>
                                    <input id="country_code" name="country_code" type="text" class="form-control" placeholder="Enter Country Code" required>
                                </div>
                                <div class="email mb-3">
                                    <label class="lable_style" for="contact_no">Contact No</label>
                                    <input id="contact_no" name="contact_no" type="text" class="form-control" placeholder="Enter Contact No" required>
                                </div>
                                <div class="email mb-3">
                                    <label class="lable_style" for="status">Status</label>
                                    <input id="status" name="status" type="text" class="form-control" placeholder="Enter Status" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="mt-2">
                                    <button type="submit" class="generate_btn">Add Contact</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>


    </div>
@endsection
