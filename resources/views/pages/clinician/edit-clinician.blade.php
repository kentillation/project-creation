@extends('includes/admin-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container border rounded p-5 mt-5" id="table">
                <div class="container">
                    <div class="mb-5">
                        <a href="{{ route('clinician-list') }}" class="back-arrow" title="BACK">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
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
@endsection
