@php
    $data = json_decode($submission->data, true)
@endphp

<!DOCTYPE html>
<html lang="en" style="width: 21cm; height: 29cm; margin: 0px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Permohonan Cuti Dosen</title>

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
        .field-row-full {
            margin: 10px 0;
        }
        .field-row-full-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .field-row-full-value {
            border: 1px solid #000;
            padding: 10px;
            min-height: 40px;
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
        <h2>SURAT PERMOHONAN CUTI DOSEN</h2>
        <p>Universitas Perikanan dan Perikanan</p>
    </div>

    <div class="content">
        <div class="field-row">
            <span class="field-label">Nama Lengkap</span>
            <span class="field-value">{{ $data['nama'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">NIP</span>
            <span class="field-value">{{ $data['nip'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Jabatan</span>
            <span class="field-value">{{ $data['jabatan'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Fakultas</span>
            <span class="field-value">{{ $data['fakultas'] }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Tanggal Mulai Cuti</span>
            <span class="field-value">{{ \Carbon\Carbon::parse($data['tanggal_mulai'])->locale('id_ID')->translatedFormat('d F Y') }}</span>
        </div>

        <div class="field-row">
            <span class="field-label">Tanggal Selesai Cuti</span>
            <span class="field-value">{{ \Carbon\Carbon::parse($data['tanggal_selesai'])->locale('id_ID')->translatedFormat('d F Y') }}</span>
        </div>

        <div class="field-row-full">
            <div class="field-row-full-label">Alasan Cuti</div>
            <div class="field-row-full-value">{{ $data['alasan'] }}</div>
        </div>

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
                            Diverifikasi pada {{ \Carbon\Carbon::parse($submission->verified_at)->locale('id_ID')->translatedFormat('d F Y H:i') }}
                            @if($submission->verified_note)
                                <br>Catatan: {{ $submission->verified_note }}
                            @endif
                        @endif
                        @if($submission->approved_at)
                            <br>Disetujui pada {{ \Carbon\Carbon::parse($submission->approved_at)->locale('id_ID')->translatedFormat('d F Y H:i') }}
                            @if($submission->approved_note)
                                <br>Catatan: {{ $submission->approved_note }}
                            @endif
                        @endif
                        @if($submission->rejected_at)
                            <br>Ditolak pada {{ \Carbon\Carbon::parse($submission->rejected_at)->locale('id_ID')->translatedFormat('d F Y H:i') }}
                            @if($submission->rejected_note)
                                <br>Alasan: {{ $submission->rejected_note }}
                            @endif
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
