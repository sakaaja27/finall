<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LAPORAN</title>
    <style type="text/css">
    	#pendapatan th{
    		background-color: pink;
    		border: 0.5px black;
    		text-align: left;
    	}
    	#pendapatan td{
    		text-align: left;
    		border: 0.5px pink;
    	}
    	.head {
    		text-align: center;
    	}
    </style>
  </head>
  <body>
  	<div class="head">
  		<strong>Laporan Pendapatan</strong>
  	</div>
    <br>
    <br>
    <table class="table table-striped table-hover" id="pendapatan">
    	<thead>
			<tr >
				<th width="5%">No</th>
				<th>Tanggal</th>
				<th>Penjualan</th>
				<th>Pembelian</th>
				<th>Pendapatan</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $row)
			<tr>
				@foreach ($row as $col)
				<td>{{ $col }}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>