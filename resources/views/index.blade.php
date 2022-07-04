<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learning Activities</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
<div class="container pt-3">
    <h3>Learning Activity - Year 1 (Januari s/d Juli 2022)</h3>

    <div class="mt-5">
        @if(!$methods->isEmpty())
            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addActivityModal">
                <i class="bi bi-calendar-plus-fill"></i> &nbsp; Tambah Aktivitas
            </button>
        @endif
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addMethodModal">
            <i class="bi bi-clipboard2-plus-fill"></i> &nbsp; Tambah Metode
        </button>
    </div>

    <div class="table-sticky table-responsive mt-3 mb-5">
        <table class="table-bordered table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col" class="">Metode</th>
                    @foreach($months as $month)
                        <th scope="col" class="">{{ $month }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($methods as $method)
                    <tr>
                        <td class="align-middle text-center">
                            <a class="activity" data-bs-toggle="modal" id="methodModal" data-bs-target="#editMethodModal" href="#" data-id="{{ $method->id }}">
                                {{ $method->name }}
                            </a>
                        </td>

                        @if($method->is_default)
                            <td colspan="6" class="align-middle text-center">{{ $method->description }}</td>
                        @else
                            @for ($j = 0; $j < 6; $j++)
                                <td>
                                    <ul>
                                        <li>
                                            <a class="activity" data-bs-toggle="modal" data-bs-target="#activityModal" href="#" data-id="{{ $j }}">Problem Solving And Decision Making</a>
                                            <span class="activity-date">(02/01/2019 - 05/01/2019)</span>
                                        </li>
                                        <br>
                                        <li>
                                            Problem Solving And Decision Making
                                            <span class="activity-date">(02/01/2019 - 05/01/2019)</span>
                                        </li>
                                    </ul>
                                </td>
                            @endfor
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!--
   Edit Method Modal
-->
<div class="modal fade" id="editMethodModal" tabindex="-1" aria-labelledby="editMethodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMethodModalLabel">Edit Metode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formReview" data-id="">
                    <div class="form-row">
                        <input type="hidden" class="form-control" id="editIdMethod">

                        <div class="form-group mb-3">
                            <label>Nama Metode:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="editNameMethod">
                            </div>
                        </div>

                        <div class="form-group mb-3" id="editFormMethodDescription">
                            <label>Deskripsi Aktivitas:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="editDescriptionMethod">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnDeleteMethod" data-bs-target="#deleteMethodModal" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-outline-danger">Hapus</button>
                <button type="button" id="btnUpdateMethod" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!--
   Delete Method Modal
-->
<div class="modal fade" id="deleteMethodModal" aria-hidden="true" aria-labelledby="deleteMethodModalLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMethodModalLabel">Hapus Metode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="deleteIdMethod">
                Apakah Anda Yakin Ingin Menghapus Metode?
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" id="btnDeleteMethodFinal">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!--
   Add Method Modal
-->
<div class="modal fade" id="addMethodModal" tabindex="-1" aria-labelledby="addMethodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMethodModalLabel">Tambah Metode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formReview" data-id="">
                    <div class="form-row">
                        <div class="form-group mb-3">
                            <label>Nama Metode:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nameMethod">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Jenis Metode:</label>
                            <div class="mt-1 form-check">
                                <label for="is_default">
                                    <input class="form-check-input" type="radio" name="is_default" value="0" checked>Banyak Aktivitas <br>
                                    <input class="form-check-input" type="radio" name="is_default" value="1" >Satu Aktivitas
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3" id="descriptionMethod">
                            <label>Deskripsi Aktivitas:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="descriptionMethod">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnAddMethod" class="btn btn-primary">Simpan Metode</button>
            </div>
        </div>
    </div>
</div>

<!--
   Add Activity Modal
-->
<div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addActivityModalLabel">Tambah Aktivitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formReview" data-id="">
                    <div class="form-row">
                        <div class="form-group mb-3">
                            <label>Metode Aktivitas</label>
                            <select class="form-select" id="status">
                                @foreach($methods as $data)
                                    @if(!$data->is_default)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama Aktivitas</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Mulai</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="start">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Berakhir</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="end">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Deskripsi Aktivitas</label>
                        <div class="input-group">
                            <textarea class="form-control h-25" id="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" id="status" >
                            <option>Berlangsung</option>
                            <option>Selesai</option>
                            <option>Akan Datang</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan Aktivitas</button>
            </div>
        </div>
    </div>
</div>

<!--
   Edit Activity Modal
-->
<div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activityModalLabel">Edit Aktivitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formReview" data-id="">
                    <div class="form-row">
                        <div class="form-group mb-3">
                            <label>Nama Aktivitas</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Mulai</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="start">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Berakhir</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="end">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Deskripsi Barang</label>
                        <div class="input-group">
                            <textarea class="form-control h-25" id="ddescription" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" id="status" >
                            <option>Berlangsung</option>
                            <option>Selesai</option>
                            <option>Akan Datang</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Update Aktivitas</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/method.js') }}"></script>

</body>
</html>
