@extends('reporter.master')


@section('body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Edit Post</span>
        </nav>

        <div class="sl-pagebody">
            {{--<div class="sl-page-title">
                <h5>Add Category</h5>
            </div>--}}
            <!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

                <form action="{{route('reporter-update-post')}}" name="editPostForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">


                        <div class="mg-b-25">
                            <!-- col-4 -->


                        </div><!-- col-4 -->

                    </div><!-- row -->



                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Title: <span
                                        class="tx-danger">*</span></label>
                                <input required class="form-control" type="text" name="post_title" value="{{$post->post_title}}">
                                <input type="hidden" name="id" class="form-control" value="{{$post->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Short Description: <span
                                        class="tx-danger">*</span></label>
                                <input required class="form-control" type="text" name="post_short_description" maxlength="150" value="{{$post->post_short_description}}">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Long Description: <span
                                        class="tx-danger">*</span></label>
                                <textarea name="post_long_description" class="form-control" id="editor">{!! $post->post_long_description !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="form-control-label">Post Image: <span
                                    class="tx-danger">*</span></label>
                            <input  type="file" name="image" accept="image/*">
                            <br/><br/>
                            <img src="{{asset($post->image)}}" alt="" height="100" width="120">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Youtube Link: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="url" name="video" value="{{$post->video}}">
                            </div>
                        </div>
                    </div>

                    <div class="row col-lg-4 mt-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Breaking News: <span
                                    class="tx-danger">*</span></label>
                            {{--<select class="form-control select2" data-placeholder="Choose country">
                                <option label="Choose country"></option>
                                <option value="USA">United States of America</option>
                                <option value="UK">United Kingdom</option>
                                <option value="China">China</option>
                                <option value="Japan">Japan</option>
                            </select>--}}
                            <div class="col-md-9 radio">
                                <label> <input required type="radio" {{$post->is_breaking==1 ? 'checked' : '' }} name="is_breaking" value="1">
                                    Yes </label>
                                <label> <input required type="radio" {{$post->is_breaking==0 ? 'checked' : '' }} name="is_breaking" value="0">
                                    No </label>

                            </div>

                        </div>
                    </div>

                    <div class="row col-lg-4 mt-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Publication Status: <span
                                    class="tx-danger">*</span></label>

                            <div class="col-md-9 radio">
                                <label> <input required type="radio" {{$post->publication_status==1 ? 'checked' : '' }} name="publication_status" value="1">
                                    Published </label>
                                <label> <input required type="radio" {{$post->publication_status==0 ? 'checked' : '' }} name="publication_status" value="0">
                                    Unpublished </label>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Publication Date: <span
                                        class="tx-danger">*</span></label>
                                <input required class="form-control" type="date" name="publication_date" value="{{$post->publication_date}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-layout-footer">
                        <input type="submit" class="btn btn-info mg-r-5" value="Submit Form">
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div><!-- card -->

        <!-- row -->

        <!-- card -->

    <!-- sl-pagebody -->
        @include('reporter.include.footer')

    </div>
    <script>
        document.forms['editPostForm'].elements['category_id'].value = '{{ $post->category_id }}';
    </script>
@endsection
