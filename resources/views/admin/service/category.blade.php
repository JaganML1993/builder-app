@extends('layouts.admin')

@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Advance Table Widget 1-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->

                <!--end::Header-->

            </div>
            @php
                $categories = \App\Models\Blogcategory::latest()->get();
            @endphp
            <div class="row">
                <div class="col-md-7">
                    @include('inc.messages')
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center category-table datatable"
                                id="kt_advance_table_widget_1">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($categories) && $categories->count() > 0)
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->id != 0)
                                                        <div class="btn-group">
                                                            <a class="btn btn-info btn-xs" title="Edit Category"
                                                                href="{{ route('admin.blog-category.edit',['blog_category'=>$item->id]) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <form class="delete-form pl-2" method="POST"
                                                                action="{{ url('admin/blog-category/' . $item->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-xs"
                                                                    title="Delete category"
                                                                    onclick="return confirm(&quot;Are you sure you want to delete?&quot;)"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                        <div class="row">

                            <div class="col-sm-12 col-md-7 pages-shown text-right">

                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end col-->

                <div class="col-md-5 cur-sec">
                    <h5>Add Categories</h5>
                    <form class="validate-form" id="city-form1" action="{{ route('admin.blog-category.store') }}" method="POST"
                        name="city-form1">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="name">Category Name<font class="text-danger">*
                                        </font></label>
                                    <input type="text" name="name" id="name1" class="form-control"  value="{{ $blogCategory->name??'' }}" required />
                                    <input type="hidden" name="id" value="{{ $blogCategory->id??'' }}">
                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label" for="url">Category Url<font class="text-danger">*
                                        </font></label>
                                    <input type="text" name="url" id="url1" class="form-control" required />
                                    <font>Make sure to avoid special characters except "-" symbol.</font>
                                </div> --}}
                            </div>

                        </div>

                        <button type="submit" id="city-form1" class="btn btn-success submit">Submit</button>


                    </form>

                </div>
            </div>

        </div>
        <!--end::Advance Table Widget 1-->
        <!--begin::Advance Table Widget 2-->


        <!--end::Advance Table Widget 3-->



        <!--end::Advance Table Widget 6-->
        <!--begin::Advance Table: Widget 7-->

        <!--end::Advance Table Widget 7-->
        <!--begin::Advance Table Widget 8-->

        <!--begin::Advance Table Widget 9-->

        <!--end::Advance Table Widget 9-->
        <!--begin::Advance Table Widget 10-->

        <!--end::Advance Table Widget 10-->
    </div>
    <!--end::Container-->
    </div>
    <div class="modal fade" id="category-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form class="validate-form" id="category-form" action="" method="POST" name="category-form">
                    @csrf
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Category Name<font class="text-danger">*</font>
                                </label>
                            <input type="text" name="name" id="name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="url">Category Url<font class="text-danger">*</font>
                                </label>
                            <input type="text" name="url" id="url" class="form-control" required />
                            <font>Make sure to avoid special characters except "-" symbol.</font>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" id="category-form"
                            onclick="document.getElementById('category-form').submit();"
                            class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script>
        
    </script>


@endsection
