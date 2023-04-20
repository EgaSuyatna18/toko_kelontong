<style>
  @media print {
         .no-print {
            display: none;
         }
      }
</style>

<a class="btn btn-info mb-4 no-print" href="/laporan?print=true">
  <i class="fa fa-print"></i>
  Print
</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Tanggal</th>
      <th scope="col">QTY</th>
      <th scope="col">Harga</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($transaksis->getResultArray() as $key => $transaksi) : ?>
        <tr>
            <td scope="col"><?= $key + 1 ?></td>
            <td><?= $transaksi['nama_barang'] ?></td>
            <td><?= $transaksi['tanggal'] ?></td>
            <td><?= $transaksi['qty'] ?></td>
            <td><?= $transaksi['harga'] ?></td>
            <td><?= $transaksi['total'] ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if(isset($_GET['print'])) : ?>
<script>
  window.print();
</script>
<?php endif; ?>