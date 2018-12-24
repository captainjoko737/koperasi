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

<center><h4>LAPORAN KOPERASI WARGA FKIP</h4><h4>{{ $from }} s.d {{ $to }}</h4></center>

<table>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>S.Pokok</th>
    <th>S.Wajib</th>
    <th>S.Sukarela</th>
    <th>SP+SW+SS</th>
    <th>Sisa Pinjaman</th>
    <th>Angsuran</th>
    <th>Jasa</th>
    <th>BJS</th>
    <th>BJP</th>
    <th>BJS+BJP</th>
    <th>Sukarela</th>
    <th>(BJS+BJP)-Sukarela</th>
  </tr>
  @foreach ($result as $key => $value)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $value['nama'] }}</td>
      @if ($value['simpanan_pokok'] != 0)
        <td>{{ number_format($value['simpanan_pokok'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['simpanan_wajib'] != 0)
        <td>{{ number_format($value['simpanan_wajib'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['simpanan_sukarela'] != 0)
        <td>{{ number_format($value['simpanan_sukarela'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['sp_sw_ss'] != 0)
        <td>{{ number_format($value['sp_sw_ss'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['sisa_pinjaman'] != 0)
        <td>{{ number_format($value['sisa_pinjaman'], 2) }}</td>
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

      @if ($value['bjs'] != 0)
        <td>{{ number_format($value['bjs'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['bjp'] != 0)
        <td>{{ number_format($value['bjp'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['bjs_bjp'] != 0)
        <td>{{ number_format($value['bjs_bjp'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['sukarela'] != 0)
        <td>{{ number_format($value['sukarela'], 2) }}</td>
      @else
        <td>-</td>
      @endif

      @if ($value['bjs_bjp_sukarela'] != 0)
        <td>{{ number_format($value['bjs_bjp_sukarela'], 2) }}</td>
      @else
        <td>-</td>
      @endif

    </tr>
    @endforeach
    <tr>
      <td></td>
      <th>JUMLAH</th>
      <th>Rp.{{ number_format($simpanan_pokok, 2) }}</th>
      <th>Rp.{{ number_format($simpanan_wajib, 2) }}</th>
      <th>Rp.{{ number_format($simpanan_sukarela, 2) }}</th>
      <th>Rp.{{ number_format($sp_sw_ss, 2) }}</th>
      <th>Rp.{{ number_format($sisa_pinjaman, 2) }}</th>
      <th>Rp.{{ number_format($angsuran, 2) }}</th>
      <th>Rp.{{ number_format($jasa, 2) }}</th>
      <th>Rp.{{ number_format($bjs, 2) }}</th>
      <th>Rp.{{ number_format($bjp, 2) }}</th>
      <th>Rp.{{ number_format($bjs_bjp, 2) }}</th>
      <th>Rp.{{ number_format($sukarela, 2) }}</th>
      <th>Rp.{{ number_format($bjs_bjp_sukarela, 2) }}</th>
      
    </tr>
  
</table>
<br><br>
<table id="t01">
  <tr>
    <th><center></center></th>
    <th><center></center></th>
    <th><center>Bandung, {{ $tanggal }}</center></th>
  </tr>
  <tr>
    <th width="33%"><center>Ketua</center></th>
    <th width="33%"><center>Bendahara</center></th>
    <th width="33%"><center>Sekertaris</center></th>
  </tr>
</table>
<br>
<br>
<table id="t01">
  <tr>
    <th width="33%"><center>{{ $ketua }}</center></th>
    <th width="33%"><center>{{ $bendahara }}</center></th>
    <th width="33%"><center>{{ $sekertaris }}</center></th>
  </tr>
</table>

</body>
</html>
