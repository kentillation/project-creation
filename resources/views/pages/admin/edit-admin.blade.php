@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>System Admin Information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item">System Admins</li>
          <li class="breadcrumb-item">List of System Admins</li>
          <li class="breadcrumb-item active">System Admin Information</li>
        </ol>
      </nav>
    </div>
    <div class="mb-3">
        <a href="{{ route('admin-list') }}" title="Back" class="back">
            <i class="bi bi-arrow-left"></i>
            &nbsp;Back
        </a>
     </div>
    @if(Session::has('success'))
      <div class="alert alert-success text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(Session::has('removal'))
      <div class="alert alert-danger text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('removal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-8">
          <div class="row">
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body m-2">
                  <h5 class="card-title"></h5>
                  <form method="post" action="{{ route('update-save-admin', ['id' => $tbl_admin['id']]) }}">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <label for="name">Name</label>
                        <input type='text' name='name' value="{{ $tbl_admin['first_name'] }} {{ $tbl_admin['middle_name'] }} {{ $tbl_admin['last_name'] }}" id="name" class="form-control mb-3" readonly />
                      </div>
                      <div class="col-12">
                        <label for="email">Email</label>
                        <input type='email' name='email' value="{{ $tbl_admin['email'] }}" id="email" class="form-control mb-3" readonly />
                      </div>
                      <div class="col-12">
                        <label for="username">Username</label>
                        <input type='text' name='username' value="{{ $tbl_admin['username'] }}" id="username" class="form-control mb-3" readonly />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection