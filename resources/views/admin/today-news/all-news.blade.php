@extends('admin.master')

@section('body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Today's News</span>
        </nav>

        <div class="sl-pagebody table-responsive">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

        {{--<div class="sl-page-title">
            <div class="d-flex justify-content-end">
                <a type="button" href="{{route('reporter-add-post')}}" class="btn btn-success">Add Post</a>
            </div>
            <h5>Today's News</h5>

            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
        </div>--}}
        <!-- sl-page-title -->

            <div class="table-responsive card pd-20 pd-sm-40">




                <div class="table-responsive table-wrapper">

                    <div class="sl-page-title d-flex justify-content-end">
                        <a type="button" href="{{route('add-post')}}" class="btn btn-success">Add Post</a>
                    </div>

                    <table id="datatable1" class="table-responsive table display responsive">
                        <thead>
                        <tr>

                            <th class="wd-15p">No</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Post Title</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Breaking News</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Views</th>
                            <th class="wd-15p">Publication Date</th>
                            <th class="wd-15p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$post->category_name}}</td>
                                <td>{{$post->post_title}}</td>
                                <td><img src="{{asset($post->image)}}" alt="" height="100" width="100"></td>
                                @if($post->is_breaking==1)
                                    <td>Yes</td>
                                @else
                                    <td>No</td>

                                @endif

                                @if($post->publication_status==1)
                                    <td>Published</td>
                                @else
                                    <td>Unpublished</td>

                                @endif
                                <td>{{$post->popularity}}</td>

                                <td>{{$post->publication_date}}</td>

                                <td>
                                    <a href="{{route('single-article',['id'=>$post->id])}}" target="_blank"
                                       class="btn btn-sm btn-primary">View</a>
                                    <a href="{{route('edit-post',['id'=>$post->id])}}"
                                       class="btn btn-sm btn-success mt-2">Edit</a>
                                    <a href="#" id="{{$post->id}}" class="btn btn-sm btn-danger mt-2"
                                       onclick="event.preventDefault();
                                           var check = confirm('Are you sure you want to delete?');
                                           if(check){
                                           document.getElementById('deleteCategoryForm'+'{{$post->id}}').submit();
                                           }"
                                    >Delete</a>
                                    <form id="deleteCategoryForm{{$post->id}}"
                                          action="{{route('delete-post')}}"
                                          method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$post->id}}">
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
    {{--    <script src="{{asset('/')}}admin/assets/lib/bootstrap/bootstrap.js"></script>--}}
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


