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
		<h5>Laporan Data Log</h4>
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> --}}
	</center>
    <p style="margin-bottom: 10px;">
        {{ strlen($tanggal) > 0 ? $tanggal : 'Seluruh Waktu' }}
    </p>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No.</th>
				<th>Nama Device</th>
				<th>User</th>
                <th>Status</th>
                <th>Aktifitas</th>
                <th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
            @if($logs->count() > 0)
            @foreach ($logs as $item)
                <tr class="bg-slate-50 border-b dark:bg-gray-800 dark:border-gray-700">
                    <th>
                        {{ $loop->iteration }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->device }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->user }}
                    </td>
                    <td class="px-6 py-4">
                            {{ $item->status }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->activity }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->created_at }}
                    </th>
                </tr>
            @endforeach
        @else
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" colspan='6' class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Belum ada data Masuk
            </th>
        </tr>
        @endif
		</tbody>
	</table>

</body>
</html>
