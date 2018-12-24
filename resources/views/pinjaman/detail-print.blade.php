<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>


<center><h3>Pinjaman Koperasi Fkip </h3></center>
<pre>
  Nama                : {{ $pinjaman['nama'] }}
  Jumlah Pinjaman     : Rp. {{ number_format($pinjaman['jumlah_pinjaman'], 2) }}
  Tenor               : {{ $pinjaman['tenor'] }} bulan
  Provisi             : {{ $pinjaman['provisi'] }}% dari pinjaman (Rp. {{ number_format($pinjaman['jumlah_pinjaman'] - $pinjaman['dana_cair'] , 2) }})
  Dana Diterima       : Rp. {{ number_format($pinjaman['dana_cair'], 2) }}
</pre> 

<hr>
<br>
<h3>Table Angsuran</h3>
<table>
  <tr>
    
    <th>Bulan</th>
    <th>Angsuran Bunga</th>
    <th>Angsuran Pokok</th>
    <th>Total Angsuran</th>
    <th>Sisa Pinjaman</th>
    <th>Jatuh Tempo</th>
  </tr>

  @foreach ($result as $key => $value)

      @if($loop->last)
        <tr>
          <td><strong> {{ $value['bulan'] }}</strong></td>
          <td><strong> Rp. {{ number_format($value['angsuran_bunga'], 2) }}</strong></td>
          <td><strong> Rp. {{ number_format($value['angsuran_pokok'], 2) }}</strong></td>
          <td><strong> Rp. {{ number_format($value['total_angsuran'], 2) }}</strong></td>
          <td><strong></strong></td>
          <td><strong></strong></td>
        </tr>
      @elseif($loop->first)
        
      @else
        <tr>
          <td>{{ $value['angsuran_ke'] }}</td>
          <td>Rp. {{ number_format($value['angsuran_bunga'], 2) }}</td>
          <td>Rp. {{ number_format($value['angsuran_pokok'], 2) }}</td>
          <td>Rp. {{ number_format($value['total_angsuran'], 2) }}</td>
          <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
          <th>{{ $value->tanggal_jatuh_tempo->format('d, M Y') }}</th>
        </tr>
      @endif
  
  @endforeach
</table>

</body>
</html>
