<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learning Activities</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid pt-3">
    <h3>Learning Activity - Year 1 (Januari s/d Desember 2022)</h3>

    <div class="mt-5">
        <button type="button" class="btn btn-primary me-2">
            <i class="bi bi-calendar-plus-fill"></i> &nbsp; Tambah Aktivitas
        </button>

        <button type="button" class="btn btn-outline-primary">
            <i class="bi bi-clipboard2-plus-fill"></i> &nbsp; Tambah Metode
        </button>
    </div>

    <div class="table-sticky table-responsive mt-3 mb-5">
        <table class="table-bordered table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col" class="">Metode</th>
                    <th scope="col" class="">Januari</th>
                    <th scope="col" class="">Februari</th>
                    <th scope="col" class="">Maret</th>
                    <th scope="col" class="">April</th>
                    <th scope="col" class="">Mei</th>
                    <th scope="col" class="">Juni</th>
                    <th scope="col" class="">Juli</th>
                    <th scope="col" class="">Agustus</th>
                    <th scope="col" class="">September</th>
                    <th scope="col" class="">Oktober</th>
                    <th scope="col" class="">November</th>
                    <th scope="col"  class="">Desember</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 4; $i++)
                    <tr>
                        <td class=" align-middle text-center">Workshop / Self Learning</td>
                        @for ($j = 0; $j < 12; $j++)
                            <td class="">
                                <ul>
                                    <li>
                                        Problem Solving And Decision Making
                                        <span class="activity-date">(02/01/2019 - 05/01/2019)</span>
                                    </li>
                                    <li>
                                        Problem Solving And Decision Making
                                        <span class="activity-date">(02/01/2019 - 05/01/2019)</span>
                                    </li>
                                </ul>
                            </td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
</body>
</html>
