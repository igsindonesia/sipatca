@php
    $data = json_decode($submission->data, true)
@endphp

<!DOCTYPE html>
<html lang="en" style="width: 21cm; height: 29cm; margin: 0px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Tugas HKI (Hak Cipta)</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 14px;
        }
        .header p {
            margin: 2px 0;
            font-size: 11px;
        }
        .content {
            margin: 20px 0;
            line-height: 1.6;
        }
        .field-row {
            margin: 10px 0;
            display: flex;
        }
        .field-label {
            width: 150px;
            font-weight: bold;
        }
        .field-value {
            flex: 1;
            border-bottom: 1px solid #000;
            padding: 2px 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .signature-section {
            margin-top: 30px;
            display: flex;
            justify-content: space-around;
        }
        .signature-box {
            width: 150px;
            text-align: center;
        }
        .signature-line {
            border-top: 1px solid #000;
            margin-top: 30px;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>SURAT TUGAS HKI (HAK CIPTA)</h2>
        <p>Universitas Perikanan dan Perikanan</p>
    </div>

    <div class="content">
        <div class="field-row">
            <span class="field-label">Semester</span>
            <span class="field-value">{{ $data['semester'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Nomor Permohonan</span>
            <span class="field-value">{{ $data['nomor_permohonan'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Tanggal Permohonan</span>
            <span class="field-value">{{ \Carbon\Carbon::parse($data['tanggal_permohonan'])->locale('id_ID')->translatedFormat('d F Y') }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Jenis Ciptaan</span>
            <span class="field-value">{{ $data['jenis_ciptaan'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Judul Ciptaan</span>
            <span class="field-value">{{ $data['judul_ciptaan'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Nomor Pencatatan</span>
            <span class="field-value">{{ $data['nomor_pencatatan'] }}</span>
        </div>

        <h3 style="margin-top: 15px; margin-bottom: 10px;">Daftar Dosen Penciptaan</h3>
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">No.</th>
                    <th style="width: 35%;">Nama</th>
                    <th style="width: 25%;">Keterangan</th>
                    <th style="width: 30%;">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['daftar_dosen'] as $index => $dosen)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dosen['nama'] }}</td>
                    <td>{{ $dosen['keterangan'] }}</td>
                    <td>{{ $dosen['alamat'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3 style="margin-top: 15px; margin-bottom: 10px;">Status Persetujuan</h3>
        <table>
            <thead>
                <tr>
                    <th style="width: 30%;">Status</th>
                    <th style="width: 70%;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>{{ $submission->status }}</strong></td>
                    <td>
                        @if($submission->verified_at)
                            Diverifikasi: {{ \Carbon\Carbon::parse($submission->verified_at)->locale('id_ID')->translatedFormat('d F Y H:i') }}
                        @endif
                        @if($submission->approved_at)
                            <br>Disetujui: {{ \Carbon\Carbon::parse($submission->approved_at)->locale('id_ID')->translatedFormat('d F Y H:i') }}
                        @endif
                        @if($submission->rejected_at)
                            <br>Ditolak: {{ \Carbon\Carbon::parse($submission->rejected_at)->locale('id_ID')->translatedFormat('d F Y H:i') }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        @if($submission->approved_at)
            <div style="margin-top: 30px;">
                <p><strong>Nomor Surat:</strong> {{ $submission->formattedLetterNumber }}</p>
            </div>
        @endif
    </div>

    @if($dekan && $submission->approved_at)
        <div class="signature-section">
            <div class="signature-box">
                <div class="signature-line">{{ $dekan->name }}</div>
                <p style="margin-top: 5px; font-size: 10px;">Dekan</p>
            </div>
        </div>
    @endif
</body>
</html>
