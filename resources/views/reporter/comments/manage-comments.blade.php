@extends('reporter.master')

@section('body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Manage Comments</span>
        </nav>

        <div class="sl-pagebody table-responsive">
            <div class="sl-page-title">
                <h5>Comments List</h5>
                <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
            </div><!-- sl-page-title -->

            <div class="table-responsive card pd-20 pd-sm-40">


                <div class="table-responsive table-wrapper" style="overflow-x:auto;">
                    <table id="datatable1" class="table-responsive table display responsive" style="width: 100%;">
                        <thead>
                        <tr>

                            <th class="wd-15p">No</th>
                            <th class="wd-15p">User Name</th>
                            <th class="wd-15p">Comment</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Visibility</th>
                            <th class="wd-15p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$comment->full_name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{\Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}</td>

                                @if($comment->status==1)
                                    <td>Shown</td>
                                @else
                                    <td>Hidden</td>

                                @endif


                                <td>
                                    @if($comment->status==1)
                                        <a href="{{route('reporter-change-comment-status',['id'=>$comment->id])}}" onclick="confirm('Are you sure to change status of the comment?')"
                                           class="btn btn-sm btn-danger">Hide</a>
                                    @else
                                        <a href="{{route('reporter-change-comment-status',['id'=>$comment->id])}}" onclick="confirm('Are you sure to change status of the comment?')"
                                           class="btn btn-sm btn-success">Show</a>
                                    @endif
                                </td>
                                <td>
                                    @if($comment->client_status==1)
                                        <a href="{{route('reporter-change-client-status',['id'=>$comment->client_id])}}" class="btn btn-sm btn-danger"  onclick="confirm('Are you sure to change status of the user?')">Ban User</a>
                                    @else
                                        <a href="{{route('reporter-change-client-status',['id'=>$comment->client_id])}}"  class="btn btn-sm btn-success"  onclick="confirm('Are you sure to change status of the user?')">Unban User</a>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->


            <!-- card -->


        </div><!-- sl-pagebody -->
        @include('reporter.include.footer')
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/')}}admin/assets/lib/jquery/jquery.js"></script>
    <script src="{{asset('/')}}admin/assets/lib/popper.js/popper.js"></script>
    {{--    <script src="{{asset('/')}}admin/assets/lib/bootstrap/bootstrap.js"></script>--}}
    <script src="{{asset('/')}}admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{asset('/')}}admin/assets/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{asset('/')}}admin/assets/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('/')}}admin/assets/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{asset('/')}}admin/assets/lib/select2/js/select2.min.js"></script>
    <script>
        $(function(){
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
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>

@endsection

