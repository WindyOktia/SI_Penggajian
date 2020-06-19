<div class="card mt-3 border-warning">
    <div class="card-body">
        <p>Pilih Karyawan</p>
        <form action="" method="get" id="formkar">
            <select name="id" id="kar" class="form-control col-5">
                <option value="" selected disabled>- pilih karyawan -</option>
                <?php foreach($karyawan as $kar):?>
                <option value="<?= $kar['id_karyawan']?>" <?php if(isset($_GET['id'])&&$_GET['id']==$kar['id_karyawan']){echo 'selected';}?>><?= $kar['nama']?></option>
                <?php endforeach?>
            </select>
        </form>
    </div>
</div>

<?php if(isset($_GET['id'])){?>
    <?php foreach($detailkar as $det):?>
<div class="card card-body mt-3">
    <form action="<?= base_url('admin/addGaji')?>" method="post">
    <div class="form-group">
        <label for="">Gaji Pokok <small>( Rp. )</small></label>
        <input type="hidden" name="id" value="<?=$det['id_karyawan']?>">
        <input type="text" name="gaji" class="form-control col-4" value="<?= $det['gaji_pokok']?>" readonly>
    </div>

    <div class="form-group">
        <label for="">Bonus Gaji <small>( Rp. )</small> | <i>opsional</i></label>
        <input type="number" name="bonus" class="form-control col-4 mb-3" placeholder="total bonus" value="">
        
    </div>
    <div class="form-group">
        <label for="">Detail Bonus | <i>opsional</i></label>
        <textarea name="detail" id="" cols="30" class="form-control mt-2" rows="4"></textarea>
            <script>
                CKEDITOR.replace( 'detail' );
            </script>
    </div>
    <div class="form-group">
        <label for="">Tanggal Penggajian</label>
        <input type="date" name="tgl_dibayar" id="tgl_dibayar" class="form-control">
    </div>
        <button class="btn btn-success float-right" type="submit">Simpan</button>
    </form>
</div>
<?php endforeach?>
<?php } ?>