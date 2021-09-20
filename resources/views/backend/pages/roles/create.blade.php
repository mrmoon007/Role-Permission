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

                        <label class="ckbox">
                            <input type="checkbox" id="checkAll">
                            <span>All</span>
                        </label>
                        <hr>
                        @php $i = 1; @endphp
                        @foreach ($permission_groups  as $group)
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                </div>
                            </div>

                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                @php
                                    $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                    $j = 1;
                                @endphp
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @php  $j++; @endphp
                                @endforeach
                                <br>
                            </div>

                        </div>
                        @php  $i++; @endphp
                            
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
<script>
    /**
    * Check all the permissions
    */
    $("#checkAll").click(function(){
        if($(this).is(':checked')){
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        }else{
            // un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

    function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
</script>
@endsection
