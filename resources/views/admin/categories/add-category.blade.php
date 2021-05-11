@extends('admin.master')


@section('body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Add Category</span>
        </nav>

        <div class="sl-pagebody">
            {{--<div class="sl-page-title">
                <h5>Add Category</h5>
            </div><!-- sl-page-title -->--}}

            <div class="card pd-20 pd-sm-40">
                <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

                <form action="{{route('new-category')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-layout">


                        <div class="mg-b-25">
                            <div class=" row col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span
                                            class="tx-danger">*</span></label>
                                    <input required class="form-control" type="text" name="category_name">
                                </div>
                            </div><!-- col-4 -->


                            <div class="row col-lg-4 mt-3">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Publication Status: <span
                                            class="tx-danger">*</span></label>
                                    {{--<select class="form-control select2" data-placeholder="Choose country">
                                        <option label="Choose country"></option>
                                        <option value="USA">United States of America</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="China">China</option>
                                        <option value="Japan">Japan</option>
                                    </select>--}}
                                    <div class="col-md-9 radio">
                                        <label> <input required type="radio" name="publication_status" value="1">
                                            Published </label>
                                        <label> <input required type="radio" name="publication_status" value="0">
                                            Unpublished </label>
                                    </div>

                                </div>
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

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
