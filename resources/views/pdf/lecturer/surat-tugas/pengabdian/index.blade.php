@php
$data = json_decode($submission->data, true)
@endphp

<!DOCTYPE html>
<html lang="en" style="width: 21cm; height: 29cm; margin: 0px;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Tugas Pengabdian Masyarakat</title>

    <style>
        td {
            vertical-align: top;
            padding: 0px 3px;
        }

        .p-0 {
            padding: 0px;
        }

        .table-bordered,
        .table-bordered th,
        .table-bordered td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 5px;
        }

        .d-block {
            display: block;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .text-center {
            text-align: center;
        }

        .text-justify {
            text-align: justify;
        }

        .text-indent {
            text-indent: 30px;
        }

        .text-info {
            font-size: 12px;
            color: #888;
        }

        .lh-1-5 {
            line-height: 1.5;
        }

        .vertical-align-middle {
            vertical-align: middle;
        }

        .vertical-align-top {
            vertical-align: top;
        }

        .underline {
            text-decoration: underline;
        }

        .bold {
            font-weight: 700;
        }

        .bolder {
            font-weight: 900;
        }

        .w-100 {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .logo {
            height: auto;
            width: 100px;
        }

        .pb-10 {
            padding-bottom: 10px;
        }

        .py-10 {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .px-10 {
            padding-left: 10px;
            padding-right: 10px;
        }

        .px-50 {
            padding-left: 50px;
            padding-right: 50px;
        }

        .py-50 {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .mt-16 {
            margin-top: 16px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .ml-30 {
            margin-left: 30px;
        }

        .m-0 {
            margin: 0;
        }

        td:empty::after {
            content: "\00a0";
        }

        .ttd {
            width: auto;
            height: 2cm;
        }

        .watermark {
            background-image: url('{{ asset("website/img/logo-upn.png") }}');
            background-repeat: no-repeat;
            background-size: 99%;
            background-position: top center;
            position: absolute;
            opacity: 0.2;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .fit {
            width: 1%;
            white-space: nowrap;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body style="width: 21cm; height: 29cm; margin: 0px; position: relative;">
    <div class="watermark"></div>
    <div class="px-50 py-50">
        @include('pdf.partials.kop')

        <table class="w-100 mt-16 text-center">
            <tr>
                <td class="bold underline">SURAT TUGAS</td>
            </tr>
            <tr>
                <td class="bold">Nomor: {{ $submission->formattedLetterNumber }}</td>
            </tr>
        </table>

        <table class="w-100 mt-16">
            <tr>
                <td>Menimbang</td>
                <td>:</td>
                <td>Dalam rangka kelancaran pelaksanaan kegiatan akademik Fakultas Ilmu
                    Komputer Universitas Pembangunan Nasional ”Veteran” Jawa Timur
                    yang akan melaksanakan kegiatan Pengabdian Masyarakat</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Dasar</td>
                <td>:</td>
                <td>
                    Program kegiatan akademik Fakultas hukum Universitas Pembangunan
                    Nasional "Veteran" Jawa Timur Tahun Akademik {{ $submission->approved_at?->translatedFormat('Y') ?? '...' }}.
                </td>
            </tr>
        </table>

        <table class="w-100 mt-16 text-center">
            <tr>
                <td class="bold underline">MENUGASKAN</td>
            </tr>
        </table>

        <table class="w-100 mt-16">
            <tr>
                <td colspan="3" class="text-indent">
                    Pegawai yang namanya terlampir, untuk melaksanakan tugas dan tanggung jawabnya
                    dalam pengabdian Masyarakat
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="fit">Hari</td>
                <td class="fit">:</td>
                <td>{{ $data['hari_mulai'] }} - {{ $data['hari_selesai'] }}</td>
            </tr>
            <tr>
                <td class="fit">Tanggal</td>
                <td class="fit">:</td>
                <td>{{ Carbon\Carbon::parse($data['tanggal_mulai'])->locale('id_ID')->translatedFormat('d F Y') }} - {{ Carbon\Carbon::parse($data['tanggal_selesai'])->locale('id_ID')->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="fit">Tempat</td>
                <td class="fit">:</td>
                <td>{{ $data['tempat'] }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" class="text-indent">
                    Setelah pelaksanaan tugas, maka segera menyampaikan laporan kepada Dekan
                    Fakultas hukum, Universitas Pembangunan Nasional ”Veteran” Jawa Timur. Surat
                    Tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.
                </td>
            </tr>
        </table>

        <section class="mt-50">
            <table class="w-100">
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold">Surabaya, {{ $submission->approved_at?->translatedFormat('d F Y') ?? '' }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold capitalize">{{ $submission->approvedByEmployee->position->name }}</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold">Fakultas Hukum</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td style="position: relative;">
                        <img src="{{ asset('website/img/stempel.png') }}" alt="stempel" style="position: absolute; top: 0; left: 0; transform: translate(-25%, -25%); width: 200px; height: auto; z-index: 1;">
                        <img class="ttd" src="{{ $submission->approvedByEmployee->signatureImage }}" alt="ttd" style="position: relative; z-index: 0;">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold underline">{{ $submission->approvedByEmployee->name }}</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="">{{ $submission->approvedByEmployee->registration_type }}. {{ $submission->approvedByEmployee->registration_number }}</td>
                </tr>
            </table>
        </section>

        <div class="page-break"></div>
        <div class="mt-50"></div>

        @include('pdf.partials.kop')

        <table class="w-100 text-center bold mt-16">
            <tr>
                <td>Daftar Dosen Pengabdian Masyarakat</td>
            </tr>
            <tr>
                <td>Program Studi Hukum</td>
            </tr>
        </table>

        <table class="w-100 mt-16 table-bordered">
            <thead>
                <tr>
                    <th class="fit">No</th>
                    <th>Nama Dosen</th>
                    <th>NIP</th>
                    <th>Topik</th>
                    <th>Link Implementasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['daftar_peserta'] as $key => $peserta)
                <tr>
                    <td class="fit text-center">{{ $key + 1 }}</td>
                    <td>{{ $peserta['nama'] }}</td>
                    <td>{{ $peserta['nip'] }}</td>
                    @if($key === 0)
                    <td @if(count($data['daftar_peserta']) > 1)rowspan="{{ count($data['daftar_peserta']) }}"@endif>
                        @foreach($data['topik'] as $topic)
                            <div>{{ $topic }}</div>
                        @endforeach
                    </td>
                    <td @if(count($data['daftar_peserta']) > 1)rowspan="{{ count($data['daftar_peserta']) }}"@endif>
                        @if(isset($data['link_implementasi']) && is_array($data['link_implementasi']))
                            @foreach($data['link_implementasi'] as $link)
                                @if($link)
                                    <a href="{{ $link }}" style="display: block; margin-bottom: 5px;">{{ $link }}</a>
                                @endif
                            @endforeach
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <section class="mt-50">
            <table class="w-100">
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold">Surabaya, {{ $submission->approved_at?->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold capitalize">{{ $submission->approvedByEmployee->position->name }}</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold">Fakultas Hukum</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td style="position: relative;">
                        <img src="{{ asset('website/img/stempel.png') }}" alt="stempel" style="position: absolute; top: 0; left: 0; transform: translate(-25%, -25%); width: 200px; height: auto; z-index: 1;">
                        <img class="ttd" src="{{ $submission->approvedByEmployee->signatureImage }}" alt="ttd" style="position: relative; z-index: 0;">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold underline">{{ $submission->approvedByEmployee->name }}</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="">{{ $submission->approvedByEmployee->registration_type }}. {{ $submission->approvedByEmployee->registration_number }}</td>
                </tr>
            </table>
        </section>
    </div>
</body>

</html>