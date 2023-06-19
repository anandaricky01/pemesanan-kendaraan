<!DOCTYPE html>
<html>
<head>
	<title>Data sensor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Ketinggian Air</h4>
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> --}}
	</center>
    <p style="margin-bottom: 10px;">
        {{ strlen($tanggal) > 0 ? $tanggal : 'Seluruh Waktu' }}
    </p>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No.</th>
				<th>Keterangan</th>
				<th>Tinggi Air (cm)</th>
                <th>Tanggal Terukur</th>
			</tr>
		</thead>
		<tbody>
                <tr>
                    <td>1</td>
                    <td>Data Tertinggi</td>
                    <td>{{ 29 - $data_rekap['data_tertinggi'] < 0 ? 'Turun ' . -1*(29 - $data_rekap['data_tertinggi']) . ' cm' : 'Naik ' . 29 - $data_rekap['data_tertinggi'] . ' cm'}}</td>
                    <td>{{ $data_rekap['created_at_tertinggi'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Data Terendah</td>
                    <td>{{ 29 - $data_rekap['data_terendah'] < 0 ? 'Turun ' . -1*(29 - $data_rekap['data_terendah']) . ' cm' : 'Naik ' . 29 - $data_rekap['data_terendah'] . ' cm'}}</td>
                    <td>{{ $data_rekap['created_at_terendah'] ?? '' }}</td>
                </tr>
                <tr>
                    <td colspan="2">Data Rata - rata</td>
                    <td colspan="2">{{ 29 - $data_rekap['data_rata_rata'] < 0 ? 'Turun ' . -1*(29 - $data_rekap['data_rata_rata']) . ' cm' : 'Naik ' . 29 - $data_rekap['data_rata_rata'] . ' cm'}}</td>
                </tr>
		</tbody>
	</table>

</body>
</html>
