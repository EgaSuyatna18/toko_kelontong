<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah
</button>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($transaksis->getResultArray() as $key => $transaksi) : ?>
        <tr>
            <td scope="col"><?= $key + 1 ?></td>
            <td><?= $transaksi['nama_barang'] ?></td>
            <td>
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal"
                  onclick="setData('<?= $transaksi['qty'] ?>', '<?= $transaksi['harga'] ?>', '<?= $transaksi['total'] ?>')">
                  Detail
              </button>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Transaksi Modal -->
<div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="detailModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/transaksi" method="post" id="tambahForm">
            <div class="mb-3">
                <label>QTY</label>
                <input type="text" id="qtyUbah" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="text" id="hargaUbah" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label>Total</label>
                <input type="text" id="totalUbah" class="form-control" readonly>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="tambahForm" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
  function setData(qty, harga, total) {
    qtyUbah.value = qty
    hargaUbah.value = harga
    totalUbah.value = total
  }
</script>