@php
    $data = json_decode($submission->data, true)
@endphp

<!DOCTYPE html>
<html lang="en" style="width: 21cm; height: 29cm; margin: 0px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Lainnya Transfer</title>

    <style>
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
        .mt-20 {
            margin-top: 20px;
        }
        .mt-30 {
            margin-top: 30px;
        }
        .mt-50 {
            margin-top: 50px;
        }
        .ml-30 {
            margin-left: 30px;
        }
        .mb-0 {
            margin-bottom: 0;
        }
        .m-0 {
            margin: 0;
        }
        td:empty::after{
            content: "\00a0";
        }
        .ttd {
            width: auto;
            height: 2cm;
        }
        .watermark {
            background-image: url('{{ asset('website/img/logo-upn.png') }}');
            background-repeat: no-repeat;
            background-size: 99%;
            background-position: top center;
            position: absolute;
            opacity: 0.2;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body style="width: 21cm; height: 29cm; margin: 0px; position: relative;">
    <div class="watermark"></div>
    <div class="px-50 py-50">
        @include('pdf.partials.kop')

        <section class="px-50 mt-20">
            <table class="w-100">
                <tr>
                    <td class="vertical-align-top" style="width: 50%;">
                        <table>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td class="bold">{{ $submission->formattedLetterNumber }}</td>
                            </tr>
                            <tr>
                                <td>Klasifikasi</td>
                                <td>:</td>
                                <td>B I A S A</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td>:</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td class="bold underline">Permohonan Transfer</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table style="float: right;">
                            <tr>
                                <td></td>
                                <td>Surabaya, {{ Carbon\Carbon::parse($submission->approved_at)->locale('id_ID')->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr>
                                <td></td>
                                <td>Kepada :</td>
                            </tr>
                            <tr>
                                <td>Yth.</td>
                                <td class="bold">Wakil Rektor I</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>UPN "Veteran" Jawa Timur</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>di Surabaya</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>

        <section class="px-50 mt-20">
            <p class="text-justify lh-1-5 mb-0">Yang bertanda tangan di bawah ini :</p>
            <table class="w-100 ml-30 lh-1-5">
                <tr>
                    <td class="vertical-align-top" width="230px">Nama</td>
                    <td class="vertical-align-top" width="5px">:</td>
                    <td class="vertical-align-top">{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <td class="vertical-align-top" width="230px">NPM</td>
                    <td class="vertical-align-top" width="5px">:</td>
                    <td class="vertical-align-top">{{ $data['registration_number'] }}</td>
                </tr>
                <tr>
                    <td class="vertical-align-top" width="230px">Fakultas</td>
                    <td class="vertical-align-top" width="5px">:</td>
                    <td class="vertical-align-top">Hukum</td>
                </tr>
                <tr>
                    <td class="vertical-align-top" width="230px">Program Studi</td>
                    <td class="vertical-align-top" width="5px">:</td>
                    <td class="vertical-align-top">{{ $data['department'] }}</td>
                </tr>
            </table>
        </section>

        <section class="px-50">
            <p class="text-justify lh-1-5 m-0">Mengajukan permohonan untuk transfer kuliah ke :</p>
            <table class="w-100 ml-30 lh-1-5">
                <tr>
                    <td class="vertical-align-top" width="230px">Universitas / Institut</td>
                    <td class="vertical-align-top" width="5px">:</td>
                    <td class="vertical-align-top">{{ $data['university'] }}</td>
                </tr>
                <tr>
                    <td class="vertical-align-top" width="230px">Fakultas</td>
                    <td class="vertical-align-top" width="5px">:</td>
                    <td class="vertical-align-top">{{ $data['faculty'] }}</td>
                </tr>
                <tr>
                    <td class="vertical-align-top" width="230px">Program Studi</td>
                    <td class="vertical-align-top" width="5px">:</td>
                    <td class="vertical-align-top">{{ $data['new_department'] }}</td>
                </tr>
            </table>
            <p class="text-justify lh-1-5 m-0">Demikian atas perhatiannya diucapkan terima kasih.</p>
        </section>

        <section class="px-50 mt-20">
            <p class="text-center m-0">Hormat Kami,</p>
            <table class="w-100">
                <tr class="text-center">
                    <td class="bold capitalize">Orang Tua/Wali,</td>
                    <td width="100px"></td>
                    <td class="bold capitalize">Pemohon,</td>
                </tr>
                <tr class="text-center">
                    <td class="" height="2cm"></td>
                    <td width="100px"></td>
                    <td class="text-info" height="2cm">Materai Rp. 10.000</td>
                </tr>
                <tr class="text-center">
                    <td class="bold underline">{{ $data['parent_name'] }}</td>
                    <td width="100px"></td>
                    <td class="bold underline">{{ $data['name'] }}</td>
                </tr>
                <tr class="text-center">
                    <td class="bold"></td>
                    <td width="100px"></td>
                    <td class="">NPM. {{ $data['registration_number'] }}</td>
                </tr>
            </table>
        </section>

        <section class="px-50 mt-20">
            <p class="text-center m-0">Mengetahui</p>
            <table class="w-100">
                <tr class="text-center">
                    <td style="width: 50%; padding-right: 50px;" class="bold capitalize">Dekan,</td>
                    <td style="width: 50%; padding-left: 50px;" class="bold capitalize">{{ $submission->approvedByEmployee->position->name }}</td>
                </tr>
                <tr class="text-center">
                    <td style="width: 50%; padding-right: 50px; position: relative;">
                        <img src="{{ asset('website/img/stempel.png') }}" alt="stempel" style="position: absolute; top: -50px; left: -50px; width: 200px; height: auto; z-index: 1;">
                        <img class="ttd" src="{{ $dekan->signatureImage }}" alt="ttd" style="position: relative; z-index: 0;">
                    </td>
                    <td style="width: 50%; padding-left: 50px;"><img class="ttd" src="{{ $submission->approvedByEmployee->signatureImage }}" alt="ttd"></td>
                </tr>
                <tr class="text-center">
                    <td style="width: 50%; padding-right: 50px;" class="bold underline">{{ $dekan->name }}</td>
                    <td style="width: 50%; padding-left: 50px;" class="bold underline">{{ $submission->approvedByEmployee->name }}</td>
                </tr>
                <tr class="text-center">
                    <td style="width: 50%; padding-right: 50px;">{{ $dekan->registration_type }}. {{ $dekan->registration_number }}</td>
                    <td style="width: 50%; padding-left: 50px;">{{ $submission->approvedByEmployee->registration_type }}. {{ $submission->approvedByEmployee->registration_number }}</td>
                </tr>
            </table>
        </section>

        <section class="px-50 mt-20">
            <p class="text-justify lh-1-5 underline m-0">Tembusan :</p>
            <p class="text-justify m-0">1. Ka BAKPK</p>
            <p class="text-justify m-0">2. Koorprodi {{ $data['department'] }}</p>
        </section>
    </div>
</body>
</html>
