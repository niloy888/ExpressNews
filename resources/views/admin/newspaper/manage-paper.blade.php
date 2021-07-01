@extends('admin.master')

@section('body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Manage Newspaper</span>
    </nav>

    <div class="sl-pagebody">
        

        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <div class="table-wrapper">
                <div class="sl-page-title d-flex justify-content-end">
                    <a type="button" href="{{route('add-paper')}}" class="btn btn-success">Add Newspaper</a>
                </div>
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Link</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-15p">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($newspapers as $newspaper)
                        <tr>
                            <td>{{$newspaper->name}}</td>
                            <td>{{$newspaper->link}}</td>
                            <td>{{$newspaper->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('edit-paper',['id'=>$newspaper->id])}}"  class="btn btn-success">Edit</a>
                                <a href="#" id="{{$newspaper->id}}" class="btn btn-danger"
                                   onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deletePaperForm'+'{{$newspaper->id}}').submit();
                                       }"
                                >Delete</a>
                                <form id="deletePaperForm{{$newspaper->id}}" action="{{route('delete-paper')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$newspaper->id}}">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->


        <!-- card -->


    </div><!-- sl-pagebody -->
    @include('admin.include.footer')
</div>
@endsection
@section('scripts')
<script src="{{asset('/')}}admin/assets/lib/jquery/jquery.js"></script>
<script src="{{asset('/')}}admin/assets/lib/popper.js/popper.js"></script>
{{--<script src="{{asset('/')}}admin/assets/lib/bootstrap/bootstrap.js"></script>--}}
<script src="{{asset('/')}}admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="{{asset('/')}}admin/assets/lib/highlightjs/highlight.pack.js"></script>
<script src="{{asset('/')}}admin/assets/lib/datatables/jquery.dataTables.js"></script>
<script src="{{asset('/')}}admin/assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="{{asset('/')}}admin/assets/lib/select2/js/select2.min.js"></script>

<script>
    $(function () {
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({minimumResultsForSearch: Infinity});

    });
</script>
@endsection

