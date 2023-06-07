@extends('includes/sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container border rounded p-5 mt-5" id="table">
                <div class="container">
                    <div class="mb-5">
                        <a href="{{ route('role-list') }}" class="back-arrow" title="BACK">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    <form method="post" action="{{ route('update-save-role', ['id' => $tbl_role['id']]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Role Name</label>
                                <input type='text' name='role' value="{{ $tbl_role['role'] }}" id="role" class="form-control mb-3" required />
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
