@extends('_layouts.default')

@section('foottags')
    <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let perPage = 5,
                page = 1,
                userApiTBody = $("#userApiServerSide tbody"),
                pagination = $("#pagination")

            /***
             * View get per page value
             */
            perPageFunc = function () {
                perPage = $('#perPage').val()
                ajax(page, perPage)
            }

            /***
             * View get page value
             */
            $(document).on('click', '#pagination li', function () {
                page = $(this).val()
                ajax(page, perPage)
            })

            /***
             * View Colors Table
             * @param page
             * @param perPage
             */
            ajax = function(page = 1, perPage = 6) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("api.colors.getColor") }}',
                    data: {
                        page: page,
                        perPage: perPage
                    },
                    success: (response) => {
                        userApiTBody.find('tr').remove()
                        pagination.find('li').remove()
                        $.each(response.data, function (i, v) {
                             userApiTBody.parent().append(
                                `<tr>
                                <td>${v.id}</td>
                                <td>${v.name}</td>
                                <td>
                                    <div class="progress progress-xs"">
                                        <div class="progress-bar" style="width: 55%; background-color:${v.color}"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">${v.pantone_value}</span></td>
                                <td><input type="button" class="btn btn-primary btn-sm detailColor" data-id="${v.id}" value="Detail"></td>
                            </tr>`)
                        })
                        for (let i  = 1; i <= response.total_pages; i++) {
                            pagination.append(`<li class="page-item" value="${i}"><a class="page-link" href="#">${i}</a></li>`)
                        }
                    }
                })
            }
            ajax(page, perPage);


            /***
             * Color Detail ById Ajax Code
             */
            let id
            $(document).on('click', '.detailColor', function () {
                id = $(this).data('id')
                let url = '{{ route("api.colors.getColor", ":id") }}'.replace(':id', id);
                $.ajax({
                    type: 'POST',
                    url: url,
                    success: function (response) {
                        $('#colorName').html(response.data.name)
                        $('#colorCode').html(response.data.color)
                        $('#colorValue').html(response.data.pantone_value)
                        $('#colorYear').html(response.data.year)
                    }
                })

                $('#colorDetailModal').modal('show')
            })
        })
    </script>
    <!-- Color Detail Modal Pane -->
    <div class="modal fade" id="colorDetailModal" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="colorModalLabel">Colors Detail</h5>
                </div>
                    <div class="modal-body">
                        <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        <div id="info-part" class="content" role="tabpanel"
                             aria-labelledby="info-part-trigger">

                            <div id="customerInfoForm">
                                <div class="row">
                                    <div class="col">
                                        <label for="colorName">Name</label>
                                        <span id="colorName" disabled class="form-control"></span>

                                    </div>
                                    <div class="col">
                                        <label for="colorCode">Code(HEX)</label>
                                        <span id="colorCode" disabled class="form-control"></span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="colorYear">Year</label>
                                        <span id="colorYear" disabled class="form-control"></span>
                                    </div>
                                    <div class="col">
                                        <label for="colorValue">Pantone Value</label>
                                        <span id="colorValue" disabled class="form-control"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Colors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Homepage</a></li>
                        <li class="breadcrumb-item active">Colors</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Colors Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="userApiServerSide">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Color Name</th>
                                    <th>Color</th>
                                    <th style="width: 50px">Pantone</th>
                                    <th style="width: 60px">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix d-flex justify-content-center align-items-center">
                        <span class="badge badge-light">Show Per Page</span>
                        <div class="form-group m-0">
                            <select class="form-control" id="perPage" onchange="perPageFunc()">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <ul class="pagination pagination-sm m-0 pl-5" id="pagination"></ul>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
