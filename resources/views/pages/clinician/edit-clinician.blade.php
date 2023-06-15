@extends('includes/admin-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container clinician-list mb-5">
                @if(Session::has('success'))
                    <div class="alert alert-success text-center" role="alert" id="alertbox">
                        {{ Session::get('success') }}
                        <button class="btn-close" onclick="closeFn()"></button>
                    </div>
                @endif
                @if(Session::has('removal'))
                    <div class="alert alert-danger text-center" role="alert" id="alertbox">
                        {{ Session::get('removal') }}
                        <button class="btn-close" onclick="closeFn()"></button>
                    </div>
                @endif
                <div class="container">
                    <p class="page-title">Users / List of Clinicians / Edit Clinician</p>
                    <div class="container header rounded shadow-sm mb-4">
                        <div class="header-content">
                            <i class="bi bi-clock-history"></i> 
                            <span>
                                &nbsp; Pending Medical Records
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('clinician-list') }}" title="Back" class="back">
                            <i class="bi bi-arrow-left"></i>
                                &nbsp;Back
                        </a>
                    </div>
                    <div class="container border rounded p-5">
                        <div class="container mb-4">
                            <form method="post" action="{{ route('update-save-clinician', ['id' => $tbl_clinician['id']]) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for="name">Name</label>
                                        <input type='text' name='name' value="{{ $tbl_clinician['name'] }}" id="name" class="form-control mb-3" required />
                                    </div>
                                    <div class="col-12">
                                        <label for="email">Email</label>
                                        <input type='email' name='email' value="{{ $tbl_clinician['email'] }}" id="email" class="form-control mb-3" required />
                                    </div>
                                    <div class="col-12">
                                        <label for="username">Username</label>
                                        <input type='text' name='username' value="{{ $tbl_clinician['username'] }}" id="username" class="form-control mb-3" required />
                                    </div>
                                </div>
                                <div class="container mt-2">
                                    <button class="btn-profile mt-3" type="submit">
                                        <i class="bi bi-arrow-clockwise"></i>
                                        &nbsp;Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
