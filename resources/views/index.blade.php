<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learning Activities</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
<div class="container pt-3">
    <h3>Learning Activity - Year 1 (Januari s/d Juli 2022)</h3>

    <div class="mt-4 mb-4">
        @if(!$methods->isEmpty())
            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addActivityModal">
                <i class="bi bi-calendar-plus-fill"></i> &nbsp; Tambah Aktivitas
            </button>
        @endif
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addMethodModal">
            <i class="bi bi-clipboard2-plus-fill"></i> &nbsp; Tambah Metode
        </button>
    </div>

    <div class="table-responsive mt-3">
        <table id="table-activity" class="table-bordered table">
            <thead class="table-dark">
            <tr class="text-center">
                <th scope="col" class="">Metode</th>
                @foreach($months as $month)
                    <th scope="col" class="">{{ $month }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody id="tblBody"></tbody>
        </table>
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
                            <select class="form-select" id="idMethodActivity">
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
                                <input type="text" class="form-control" id="nameActivity">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Mulai</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="startActivity" min="2022-01-01" max="2022-06-30">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Berakhir</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="endActivity" min="2022-01-01" max="2022-06-30">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" id="statusActivity" >
                            <option value="Berlangsung">Berlangsung</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Akan Datang">Akan Datang</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnAddActivity">Simpan Aktivitas</button>
            </div>
        </div>
    </div>
</div>

<!--
   Edit Activity Modal
-->
<div class="modal fade" id="activityEditModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activityModalLabel">Edit Aktivitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="formReview" data-id="">
                    <div class="form-row">
                        <input type="hidden" id="editIdActivity">

                        <div class="form-group mb-3">
                            <label>Metode Aktivitas</label>
                            <select class="form-select" id="editMethodActivity">
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
                                <input type="text" class="form-control" id="editNameActivity">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Mulai</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="editStartActivity" min="2022-01-01" max="2022-06-30">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Aktivitas Berakhir</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="editEndActivity" min="2022-01-01" max="2022-06-30">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-select" id="editStatusActivity" >
                                <option>Berlangsung</option>
                                <option>Selesai</option>
                                <option>Akan Datang</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"
                    id="btnDeleteActivity"
                    data-bs-target="#deleteActivityModal"
                    data-bs-toggle="modal"
                    data-bs-dismiss="modal"
                    class="btn btn-outline-danger">
                    Hapus
                </button>
                <button type="button" class="btn btn-primary" id="btnUpdateActivity">Update Aktivitas</button>
            </div>
        </div>
    </div>
</div>

<!--
   Delete Method Modal
-->
<div class="modal fade" id="deleteActivityModal" aria-hidden="true" aria-labelledby="deleteActivityModalLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteActivityModalLabel">Hapus Aktivitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="deleteIdActivity">
                Apakah Anda Yakin Ingin Menghapus Aktivitas?
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" id="btnDeleteActivityFinal">Hapus</button>
            </div>
        </div>
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

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/method.js') }}"></script>
<script src="{{ asset('assets/js/activity.js') }}"></script>

<script>
    $(document).ready(function(){
        const generateMetodeComponent = (id, name, rows) => {
            return `
                <tr>
                    <td class="align-middle text-center">
                        <a class="method activity-link" data-bs-toggle="modal" id="methodModal" data-bs-target="#editMethodModal" href="#" data-id="${id}">
                            ${name}
                        </a>
                        ${rows}
                    </td>
                </tr>
            `
        }

        const generateActivity = (id, name) => {
            return `
                <li class="mb-2">
                    <a class="activity activity-link" data-bs-toggle="modal" data-bs-target="#activityEditModal" href="#" data-id="${id}">${name}</a>
                    <br>
                    <span class="activity-date">(02/01/2022 - 05/01/2022)</span>
                </li>
            `
        }

        const generateActivityDefault = (id, name) => {
            return `
                 <tr>
                    <td class="align-middle text-center">
                        <a class="method activity-link" data-bs-toggle="modal" id="methodModal" data-bs-target="#editMethodModal" href="#" data-id="${id}">
                            ${name}
                        </a>
                    </td>

                    <td colspan="6" class="align-middle text-center">Sesuai Penugasan</td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                </tr>
            `
        }
        const bulan = @json($months);
        const generateBulan = (length) => {
            let res = ``

            for (let index = 0; index < length; index++) {
                let className = `row${bulan[index]}`
                res += `<td><ul class="${className}"></ul></td>`
            }

            return res
        }

        let data = @json($methods);
        let rows = generateBulan(bulan.length)

        for (let i = 0; i < data.length; i++) {
            if(data[i].is_default === true){
                $('#tblBody').append(generateActivityDefault(data[i].id, data[i].name))
            } else {
                $('#tblBody').append(generateMetodeComponent(data[i].id, data[i].name, rows))

                for (let j = 0; j < data[i].activity.length; j++) {
                    const content = data[i].activity[j]
                    const dateArray = content.start.split("-");
                    const monthIndex = dateArray[1]

                    let currentClass = `.row${bulan[monthIndex-1]}`

                    $(currentClass)[i].innerHTML += generateActivity(content.id, content.name)
                }
            }
        }

        $('#table-activity').DataTable({
            ordering: true,
            order: [],
            fixedHeader: true,
            scrollY: '620px',
            scrollCollapse: true,
        })
    })
</script>


</body>
</html>
