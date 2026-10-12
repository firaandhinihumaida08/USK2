<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sertifikat / Hasil Asesmen - {{ $mahasiswa->nama_lengkap }}</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
        .content { margin-bottom: 30px; }
        .table-info { width: 100%; margin-top: 10px; border-collapse: collapse; }
        .table-info td { padding: 8px; vertical-align: top; }
        .footer { margin-top: 50px; text-align: right; }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h2>LAPORAN HASIL ASESMEN KOMPETENSI MAHASISWA</h2>
        <p>Lembaga Sertifikasi Profesi (LSP) Kampus</p>
    </div>
    <div class="content">
        <table class="table-info">
            <tr>
                <td width="200"><strong>NIM</strong></td>
                <td>: {{ $mahasiswa->nim }}</td>
            </tr>
            <tr>
                <td><strong>Nama Lengkap</strong></td>
                <td>: {{ $mahasiswa->nama_lengkap }}</td>
            </tr>
            <tr>
                <td><strong>Program Studi</strong></td>
                <td>: {{ $mahasiswa->program_studi }}</td>
            </tr>
            <tr>
                <td><strong>Skema Sertifikasi</strong></td>
                <td>: {{ $mahasiswa->skema->nama_skema ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>Asesor Penguji</strong></td>
                <td>: {{ $mahasiswa->asesor->nama_asesor ?? 'Belum Ditugaskan' }}</td>
            </tr>
            <tr>
                <td><strong>Status Kelulusan</strong></td>
                <td>: <strong>{{ $mahasiswa->status }}</strong></td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <p>Ditandatangani secara elektronik,</p>
        <br><br>
        <p><strong>Administrator / Dewan Asesor</strong></p>
    </div>
</body>
</html>