<a href="<?= base_url('admin/slip')?>" class="btn btn-success btn-sm mt-3">Tambah Slip Gaji</a>

<div class="card mb-4 mt-3">
<div class="card-header"><i class="fas fa-table mr-1"></i>History Penggajian</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th >No</th>
                    <th>Nama</th>
                    <th>Pokok <small>( Rp. )</small></th>
                    <th>Bonus <small>( Rp. )</small></th>
                    <th>Total <small>( Rp. )</small></th>
                    <th>Tanggal </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;foreach($gaji as $gj):?>
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= $gj['nama']?></td>
                        <td><?= $gj['gaji_pokok']?></td>
                        <td><?= $gj['gaji_bonus']?></td>
                        <td><?= $gj['gaji_pokok']+$gj['gaji_bonus']?></td>
                        <td><?= $gj['tgl_dibayar']?></td>
                        <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal<?=$gj['id_gaji']?>">
                        Detail
                        </button>
                            <a href="<?= base_url('admin/deleteGaji')?>/<?= $gj['id_gaji']?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                            <a href="<?=base_url('admin/laporan_pdf')?>/<?=$gj['id_gaji']?>" target="_blank" class="btn btn-success btn-sm"> Cetak</a>
                          </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>


<?php foreach($gaji as $editga):?>
<div class="modal fade" id="modal<?=$editga['id_gaji']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Gaji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
             <div class="col">
                1. Tanggal Penggajian <br>
                2. No Induk <br>
                3. Nama Karyawan <br>
                4. Gaji Pokok <br>
                5. Gaji Bonus <br>
                6. Total Gaji <br>
                <br>
                Detail Gaji <br>
                <?= $editga['detail']?>
             </div>
             <div class="col">
                 : <?= $editga['tgl_dibayar']?> <br>
                 : <?= $editga['no_induk']?> <br>
                 : <?= $editga['nama']?> <br>
                 : <?= $editga['gaji_pokok']?> <br>
                 : <?= $editga['gaji_bonus']?> <br>
                 : <?= $editga['gaji_pokok']+$editga['gaji_bonus']?> <br>
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach?>