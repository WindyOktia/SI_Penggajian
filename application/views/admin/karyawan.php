<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm mt-3" data-toggle="modal" data-target="#exampleModalLong">
  Tambah Data Karyawan
</button>



<div class="card mb-4 mt-3">
<div class="card-header"><i class="fas fa-table mr-1"></i>Data Karyawan</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Induk Karyawan</th>
                    <th>Nama</th>
                    <th>Tgl Diterima</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($karyawan as $kary):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $kary['no_induk']?></td>
                    <td><?= $kary['nama']?></td>
                    <td><?= $kary['tgl_diterima']?></td>
                    <td>Rp. <?= $kary['gaji_pokok']?></td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm btn-sm" data-toggle="modal" data-target="#modaledit<?= $kary['id_karyawan']?>">
                        Edit
                        </button>
                        <a href="<?=base_url('admin/deleteKaryawan')?>/<?=$kary['id_karyawan']?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
                <?php endforeach?>
                
            </tbody>
        </table>
    </div>
</div>


<!-- modal tambah -->
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/addKaryawan')?>" method="post">
            <div class="form-group">
                <label for="">No Induk</label>
                <input name="no" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input name="nama" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tgl Lahir</label>
                <input name="tgl_lahir" type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="" class="form-control">
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">No Hp</label>
                <input name="no_hp" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tgl Diterima</label>
                <input name="tgl_diterima" type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Gaji Pokok <small>( Rp. )</small></label>
                <input name="gaji" type="number" class="form-control">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end of modal tambah -->

<!-- modal edit -->
<?php foreach($karyawan as $editkar):?>
<div class="modal fade" id="modaledit<?= $editkar['id_karyawan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/updateKaryawan')?>" method="post">
            <div class="form-group">
                <label for="">No Induk</label>
                <input type="hidden" name="id" value="<?= $editkar['id_karyawan']?>">
                <input name="no" type="text" class="form-control" value="<?=$editkar['no_induk']?>">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input name="nama" type="text" class="form-control" value="<?=$editkar['nama']?>">
            </div>
            <div class="form-group">
                <label for="">Tgl Lahir</label>
                <input name="tgl_lahir" type="date" class="form-control" value="<?=$editkar['tgl_lahir']?>">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="" class="form-control">
                    <option value="pria" <?php if($editkar['jenis_kelamin']=="pria"){echo 'selected';}?>>Pria</option>
                    <option value="wanita" <?php if($editkar['jenis_kelamin']=="wanita"){echo 'selected';}?>>Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="3" class="form-control"><?= $editkar['alamat']?></textarea>
            </div>
            <div class="form-group">
                <label for="">No Hp</label>
                <input name="no_hp" type="number" class="form-control" value="<?=$editkar['no_hp']?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" value="<?=$editkar['email']?>">
            </div>
            <div class="form-group">
                <label for="">Tgl Diterima</label>
                <input name="tgl_diterima" type="date" class="form-control" value="<?=$editkar['tgl_diterima']?>">
            </div>
            <div class="form-group">
                <label for="">Gaji Pokok <small>( Rp. )</small></label>
                <input name="gaji" type="number" class="form-control" value="<?=$editkar['gaji_pokok']?>">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach ?>
<!-- end of modal edit -->