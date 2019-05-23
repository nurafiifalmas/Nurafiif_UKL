<div class="card col-sm-12">
  <div class="card-header">
    List Pembelian
  </div>
  <div class="card-body">
    <form action="db_transaksi.php?checkout=true" method="post"
    onsubmit="return confirm('Apakah anda yakin dengan pesanan ini?')">


    <table class="table">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Picture</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION["session_sewa"] as $hasil): ?>
          <tr>
            <td><?php echo $hasil["id_mobil"]; ?></td>
            <td><?php echo $hasil["jenis"]; ?></td>

            <td>
              <img src="img_mobil/<?php echo $hasil["image"]; ?>" width="100" class="img">
            </td>
            <td>
              <input type="number" name="jumlah_mobil<?php echo $hasil["id_mobil"];?>" min="1">
            </td>
            <td><?php echo $hasil["harga"]; ?></td>
            <td>
              <a href="db_transaksi.php?hapus=true&kode_sepatu=<?php echo $hasil['kode_sepatu']; ?>">
                <button type="button" class="btn btn-danger">Hapus</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <button type="submit" class="btn btn-block btn-primary">
      CHECKOUT
    </button>
    </form>
  </div>
</div>
