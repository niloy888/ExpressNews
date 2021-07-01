@extends('admin.master')

@section('body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Manage Post</span>
    </nav>

    <div class="sl-pagebody table-responsive">
      {{--  <div class="sl-page-title">
        <h5>Post List</h5>
        <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
    </div><!-- sl-page-title -->--}}

    <div class="table-responsive card pd-20 pd-sm-40">
        <h3 class="text-center text-success"> {{Session::get('message')}} </h3>


        <div class="table-responsive table-wrapper" style="overflow-x:auto;">
                    <!-- <div class="sl-page-title d-flex justify-content-end">
                        <a type="button" href="{{route('add-post')}}" class="btn btn-success">Add Post</a>
                    </div> -->
                    <table id="datatable1" class="table-responsive table display responsive" style="width: 100%;">
                        <thead>
                            <tr>

                                <th >No</th>
                                <th >User Name</th>
                                <th >Action</th>                        

                            </tr>
                        </thead>
                        <tbody>
                            
                            @php($i=1)
                            @foreach($messages as $message)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    {{$message->full_name}}
                                    @if($message->admin_seen == 0)
                                    <span class="badge badge-danger">1</span>
                                    @endif
                                </td>
                                <td><a href="{{route('admin-message-details',['id'=>$message->user_id])}}" class="btn btn-primary">Open</a></td>

                                
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
    {{--<script src="{{asset('/')}}admin/assets/js/starlight.js"></script>--}}
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

