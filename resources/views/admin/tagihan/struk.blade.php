<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Tagihan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin: 0;
            padding: 20px;
        }
        .struk {
            max-width: 350px;
            margin: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        .info, .summary {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table td, table th {
            padding: 4px;
            border-bottom: 1px dotted #000;
            text-align: left;
        }
        .total {
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .thank {
            text-align: center;
            margin-top: 10px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="struk">
        <h2>Toko Voltix</h2>

        <div class="info">
            <p>No Tagihan: {{ $tagihan->id_tagihan }}</p>
            <p>Nama Pelanggan: {{ $tagihan->pelanggan->nama_pelanggan }}</p>
            <p>Periode: {{ bulanIndo($tagihan->bulan) }} {{ $tagihan->tahun }}</p>
            <p>Tanggal Cetak: {{ now()->format('d/m/Y H:i') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th class="text-right">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Penggunaan Listrik</td>
                    <td class="text-right">{{ $tagihan->jumlah_meter }} kWh</td>
                </tr>
                <tr>
                    <td class="total">Status</td>
                    <td class="text-right">{{ $tagihan->status }}</td>
                </tr>
            </tbody>
        </table>

        <div class="summary">
            <p><strong>Total Tagihan:</strong> Rp {{ number_format($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->harga_per_kwh ?? 1000, 0, ',', '.') }}</p>
        </div>

        <div class="thank">
            <p>Terima kasih!</p>
        </div>

        <div class="no-print text-center mt-4">
            <button onclick="window.print()">Cetak Struk</button>
        </div>
    </div>
</body>
</html>
