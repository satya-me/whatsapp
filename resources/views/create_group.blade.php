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
                            <h4 class="app-card-title">Group</h4>
                        </div>
                    </div>
                </div>
                <form class="auth-form login-form is-readonly" action="{{ route('admin.store_group') }}" method="POST">
                    @csrf
                    <div class="app-card-body px-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="email mb-3">
                                    <label class="lable_style" for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" required>
                                </div>
                                <div class="email mb-3">
                                    <label class="lable_style" for="contacts_allowed">Contacts Allowed</label>
                                    <input id="contacts_allowed" name="contacts_allowed" type="text" class="form-control" placeholder="Enter contacts_allowed" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="mt-2">
                                    <button type="submit" class="generate_btn">Add Group</button>
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
