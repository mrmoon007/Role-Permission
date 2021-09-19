@extends('backend.layouts.master')

@section('title')
    all roles
@endsection

@section('extra-style')

@endsection

@section('main-content')
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Basic Responsive DataTable</h6>
        <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as
            shown in this example.</p>
        

        <div class="table-wrapper">
            <a class="btn btn-sm d-block float-right btn-success" href="{{ route('admin.roles.create') }}">Role Create</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_roles as $role)
                      <tr>
                          <td>{{ $loop->index }}</td>
                          <td>{{ $role->name }}</td>
                          <td></td>
                      </tr>
                    @endforeach
                </tbody>
            </table>

        </div><!-- table-wrapper -->
    </div><!-- card -->
</div>
@endsection

@section('extra-script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
