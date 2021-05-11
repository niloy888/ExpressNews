@extends('admin.master')

@section('body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Manage Reporters</span>
        </nav>

        <div class="sl-pagebody table-responsive">
            {{--  <div class="sl-page-title">
                  <h5>Post List</h5>
                  <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
              </div><!-- sl-page-title -->--}}

            <div class="table-responsive card pd-20 pd-sm-40">
                <h3 class="text-center text-success"> {{Session::get('message')}} </h3>


                <div class="table-responsive table-wrapper" style="overflow-x:auto;">
                    {{--<div class="sl-page-title d-flex justify-content-end">
                        <a type="button" href="{{route('add-post')}}" class="btn btn-success">Add Post</a>
                    </div>--}}
                    <table id="datatable1" class="table-responsive table display responsive" style="width: 100%;">
                        <thead>
                        <tr>

                            <th class="wd-15p">No</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Contact Number</th>
                            <th class="wd-15p">Section</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Joined Date</th>
                            <th class="wd-15p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($reporters as $reporter)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$reporter->reporter_name}}</td>
                                <td>{{$reporter->reporter_email}}</td>
                                <td>{{$reporter->reporter_contact_number}}</td>
                                <td>{{$reporter->category_name}}</td>
                                @if($reporter->status==0)
                                    <td>Inactive</td>
                                @elseif($reporter->status==1)
                                    <td>Active</td>
                                @else
                                    <td>Disabled</td>
                                @endif


                                <td>{{\Carbon\Carbon::parse($reporter->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    @if($reporter->status=="0")
                                        <a href="{{route('change-reporter-status',['id'=>$reporter->id])}}"
                                           class="btn btn-sm btn-success" onclick="confirm('Are you sure to approve the reporter?')">Approve</a>
                                    @elseif($reporter->status=="1")
                                        <a href="{{route('change-reporter-status',['id'=>$reporter->id])}}"
                                           class="btn btn-sm btn-danger mt-2" onclick="confirm('Are you sure to ban the reporter?')">Ban</a>
                                    @else
                                        <a href="{{route('change-reporter-status',['id'=>$reporter->id])}}"
                                           class="btn btn-sm btn-primary mt-2" onclick="confirm('Are you sure to unban the reporter?')">Unban</a>
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

