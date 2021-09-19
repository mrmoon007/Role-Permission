@extends('backend.layouts.master')

@section('title')
    Role create
@endsection

@section('extra-style')

@endsection

@section('main-content')
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title">Role Create</h6>
                {{-- <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p> --}}
                @include('backend.layouts.partials.messages')
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Role Name : <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" placeholder="Enter Role Name">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mb-2">Permissions : <span class="tx-danger">*</span></label>
                        @foreach ($permissions as $permission)
                            <label class="ckbox">
                                <input type="checkbox" name="permission[]" value="{{ $permission->name }}">
                                <span>{{ $permission->name }}</span>
                            </label>

                        @endforeach

                    </div>
                    <div class="form-layout-footer mg-t-30">
                        <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->

            <div class="table-wrapper">


            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>
@endsection

@section('extra-script')

@endsection
