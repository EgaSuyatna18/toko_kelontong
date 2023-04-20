<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah
</button>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Stok</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($barangs->getResultArray() as $key => $barang) : ?>
        <tr>
            <td scope="col"><?= $key + 1 ?></td>
            <td><?= $barang['nama_barang'] ?></td>
            <td><?= $barang['stok'] ?></td>
            <td>
            <?php if(!isset($barang['id_detail_barang'])) : ?>
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal"
                onclick="setData3('<?= $barang['id_barang'] ?>')">
                Detail
            </button>
            <?php else : ?>
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal"
                onclick="setData2('<?= $barang['id_barang'] ?>', '<?= $barang['id_detail_barang'] ?>', '<?= $barang['harga'] ?>', '<?= $barang['tanggal'] ?>')">
                Detail
            </button>
            <?php endif; ?>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#transaksiModal"
                onclick="setData4('<?= $barang['id_barang'] ?>', '<?= $barang['harga'] ?>')">
                Transaksi
            </button>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubahModal"
                onclick="setData('<?= $barang['id_barang'] ?>', '<?= $barang['nama_barang'] ?>', '<?= $barang['stok'] ?>')">
                Ubah
            </button>
                <form action="/barang" method="post" class="d-inline">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/barang" method="post" id="tambahForm">
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control">
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control">
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

<!-- Ubah Modal -->
<div class="modal fade" id="ubahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ubahModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/barang" method="post" id="ubahForm">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="id_barang" id ="ubahIDBarang">
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" id="ubahNamaBarang">
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" id="ubahStok">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="ubahForm" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- detail Modal -->
<div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="detailModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/barang/detail" method="post" id="detailForm">
          <input type="hidden" name="id" id="detailID">
          <input type="hidden" name="id_barang" id="detailIDBarang">
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" id="detailHarga">
            </div>
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="detailTanggal">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="detailForm" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- t Modal -->
<div class="modal fade" id="transaksiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="transaksiModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/transaksi" method="post" id="tForm">
          <input type="hidden" name="id_barang" id="tIDBarang">
          <input type="hidden" name="harga" id="tHarga">
            <div class="mb-3">
                <label>QTY</label>
                <input type="number" name="qty" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="tForm" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
    function setData(id, nama, stok) {
        ubahIDBarang.value = id;
        ubahNamaBarang.value = nama;
        ubahStok.value = stok;
    }

    function setData2(idBarang, id, harga, tanggal) {
        detailIDBarang.value = idBarang;
        detailID.value = id;
        detailHarga.value = harga;
        detailTanggal.value = tanggal;
    }

    function setData3(idBarang) {
        detailIDBarang.value = idBarang;
        detailID.value = "";
        detailHarga.value = "";
        detailTanggal.value = "";
    }

    function setData4(idBarang, harga) {
      tIDBarang.value = idBarang;
      tHarga.value = harga;
    }
</script>