<script type="text/javascript">
  function Add(){
    //set input action menjadi "insert"
    document.getElementById('action').value = "insert";

    //kosongkan inputan formnya
    document.getElementById("id_pelanggan").value = "";
    document.getElementById("nama_pelanggan").value = "";
    document.getElementById("alamat_pelanggan").value = "";
    document.getElementById("kontak").value = "";
  }
  function Edit(index){
    //set input action menjadi "update"
    document.getElementById('action').value = "update";

    //set form berdasarkan data yang dipilih
    var table = document.getElementById("table_pelanggan");
    //tampung data dari tabel
    var id_pelanggan = table.rows[index].cells[0].innerHTML;
    var nama_pelanggan = table.rows[index].cells[1].innerHTML;
    var alamat_pelanggan = table.rows[index].cells[2].innerHTML;
    var kontak = table.rows[index].cells[3].innerHTML;

    //keluarkan pada formnya
    document.getElementById("id_pelanggan").value = id_pelanggan;
    document.getElementById("nama_pelanggan").value = nama_pelanggan;
    document.getElementById("alamat_pelanggan").value = alamat_pelanggan;
    document.getElementById("kontak").value = kontak;
  }
</script>
<div class="card col-sm-12">
  <div class="card-header bg-warning">
    <h4>Daftar Pelanggan</h4>
  </div>
  <div class="card-body">
    <?php
    //membuat koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "penyewaan");
    $sql = "select * from pelanggan";
    $result = mysqli_query($koneksi,$sql);
    //digunakan untuk eksekusi sintak sql
    $count = mysqli_num_rows($result);
    //digunakan untuk menampilkan jumlah data
     ?>

     <?php if ($count == 0): ?>
       <!-- jika data dari database kosong,
       maka akan munculpesan informasi -->
       <div class="alert alert-info">
         Data belum tersedia
       </div>
     <?php else: ?>
       <!-- jika data ada maka akan ditampilkan pada tabel -->
       <table class="table" id="table_pelanggan">
         <thead>
           <tr>
             <th>Id Pelanggan</th>
             <th>Nama</th>
             <th>Alamat</th>
             <th>Kontak</th>
             <th>Image</th>
             <th>Opsi</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($result as $hasil): ?>
             <tr>
               <td><?php echo $hasil["id_pelanggan"]; ?></td>
               <td><?php echo $hasil["nama_pelanggan"]; ?></td>
               <td><?php echo $hasil["alamat_pelanggan"]; ?></td>
               <td><?php echo $hasil["kontak"]; ?></td>
               <td><img src="img_pelanggan/<?php echo $hasil["image"]; ?>" class="img" width="100"></td>
               <td><button type="button" class="btn btn-info"
                 data-toggle="modal" data-target="#modal"
                 onclick="Edit(this.parentElement.parentElement.rowIndex);">
                 Edit
               </button>
               <a href="dbPelanggan.php?hapus=pelanggan&id_pelanggan=<?php echo $hasil["id_pelanggan"];?>"
                 onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">
                 <button type="button" class="btn btn-danger">
                 Hapus
                 </button>
               </a>
              </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
       </table>
     <?php endif; ?>
  </div>
  <div class="card-footer bg-warning">
    <button type="button" class="btn btn-success"
    data-toggle="modal" data-target="#modal" onclick="Add()">
    Tambah
    </button>
  </div>
</div>
<div class="modal fade" id="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="dbPelanggan.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4>Pelanggan</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="action" id="action">
          <!-- untuk menyimpan aksi yang akan dilakukan entah itu insert / update -->
          Id Pelanggan
          <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control">
          Nama Pelanggan
          <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
          Alamat Pelanggan
          <input type="text" name="alamat_pelanggan" id="alamat_pelanggan" class="form-control">
          Kontak
          <input type="text" name="kontak" id="kontak" class="form-control">
          Image
          <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="submit" name="btn btn-success">
          Simpan
        </button>
        </div>
      </form>
    </div>
  </div>
</div>
