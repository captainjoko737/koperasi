<!DOCTYPE html>
<html>
<head>
  <title>KOPERASI FKIP</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
  font-size: 10px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

table#t01 tr:nth-child(even) {
  background-color: black;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  border-color: transparent;
  background-color: transparent;
  color: black;
}

</style>
</head>
<body>

<center><h4>LAPORAN KOPERASI WARGA FKIP</h4><h4>{{ $date }}</h4></center>

<table>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Simpanan Wajib</th>
    <th>Angsuran</th>
    <th>Jasa</th>
    <th>Denda</th>
    <th>Jumlah</th>
    <th>Sisa Pinjaman</th>
    <th>Ket</th>
  </tr>
  @foreach ($result as $key => $value)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $value['nama'] }}</td>
      @if ($value['simpanan_wajib'] != 0)
        <td>{{ number_format($value['simpanan_wajib'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['angsuran'] != 0)
        <td>{{ number_format($value['angsuran'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['jasa'] != 0)
        <td>{{ number_format($value['jasa'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['denda'] != 0)
        <td>{{ number_format($value['denda'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['jumlah'] != 0)
        <td>{{ number_format($value['jumlah'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['sisa_pinjaman'] != 0)
        <td>{{ number_format($value['sisa_pinjaman'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['keterangan'] != 0)
        <td>{{ $value['keterangan'] }}</td>
      @else
        <td>-</td>
      @endif

    </tr>
  @endforeach
    
    <tr>
      <td></td>
      <th>JUMLAH</th>
      <th>Rp. {{ number_format($total_simpanan_wajib, 2) }}</th>
      <th>Rp. {{ number_format($total_angsuran, 2) }}</th>
      <th>Rp. {{ number_format($total_jasa, 2) }}</th>
      <th>Rp. {{ number_format($total_denda, 2) }}</th>
      <th>Rp. {{ number_format($total, 2) }}</th>
      <th>Rp. {{ number_format($total_sisa_pinjaman, 2) }}</th>
      <td></td>
    </tr>
</table>
<br><br>


</body>
</html>
