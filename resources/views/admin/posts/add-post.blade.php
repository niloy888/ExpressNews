@extends('admin.master')


@section('body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Add Post</span>
        </nav>

        <div class="sl-pagebody">
            {{--<div class="sl-page-title">
                <h5>Add Category</h5>
            </div><!-- sl-page-title -->--}}

            <div class="card pd-20 pd-sm-40">
                <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

                <form action="{{route('new-post')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">


                        <div class="mg-b-25">
                            <!-- col-4 -->


                            {{--<div class="row col-lg-4 mt-3">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Publication Status: <span
                                            class="tx-danger">*</span></label>
                                    --}}{{--<select class="form-control select2" data-placeholder="Choose country">
                                        <option label="Choose country"></option>
                                        <option value="USA">United States of America</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="China">China</option>
                                        <option value="Japan">Japan</option>
                                    </select>--}}{{--
                                    --}}{{--<div class="col-md-9 radio">--}}{{--
                                        <label> <input required type="radio" name="publication_status" value="1">
                                            Published </label>
                                        <label> <input required type="radio" name="publication_status" value="0">
                                            Unpublished </label>
                                    --}}{{--</div>--}}{{--

                                </div>
                            </div>--}}
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <div class="row">
                        <div class="form-group col-lg-8">
                            {{--<div class="col-lg-4">
                                <div class="form-group has-success mg-b-0">--}}
                            <label class="form-control-label">Category: <span
                                    class="tx-danger">*</span></label>
                            <select name="category_id" class="col-md-6 form-control select2" data-placeholder="Choose Category">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            {{--</div><!-- form-group -->
                        </div>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Title: <span
                                        class="tx-danger">*</span></label>
                                <input required class="form-control" type="text" name="post_title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Short Description: <span
                                        class="tx-danger">*</span></label>
                                <input required class="form-control" type="text" name="post_short_description" maxlength="150">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Long Description: <span
                                        class="tx-danger">*</span></label>
                                <textarea name="post_long_description" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="form-control-label">Post Image: <span
                                    class="tx-danger">*</span></label>
                            <input required type="file" name="image" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Youtube Link: </label>
                                <input  class="form-control" type="url" name="video">
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
                                <label> <input required type="radio" name="is_breaking" value="1">
                                    Yes </label>
                                <label> <input required type="radio" name="is_breaking" value="0">
                                    No </label>
                            </div>

                        </div>
                    </div>

                    <div class="row col-lg-4 mt-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Publication Status: <span
                                    class="tx-danger">*</span></label>

                            <div class="col-md-9 radio">
                                <label> <input required type="radio" name="publication_status" value="1">
                                    Published </label>
                                <label> <input required type="radio" name="publication_status" value="0">
                                    Unpublished </label>
                            </div>

                        </div>
                    </div>

                    <div class="row col-lg-4 mt-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Publication Date: <span
                                    class="tx-danger">*</span></label>

                            <input required class="form-control" type="date" name="publication_date">


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
        @include('admin.include.footer')
    </div>
@endsection
