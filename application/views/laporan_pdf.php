<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Laporan</title>
  </head>
  <body>
      <?php foreach($export as $ex):?>
    <div class="text-center mt-3">
        <h3>Slip Gaji Karyawan</h3>
        <p>tgl : <?= $ex['tgl_dibayar']?></p>
    </div>
    <div class="container-fluid mt-3">
    <div class="card mb-4 mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width:15px">1. </td>
                            <td>Slip No</td>
                            <td>SLIP/00<?= $ex['id_gaji']?></td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>No Induk Karyawan</td>
                            <td><?= $ex['no_induk']?></td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>Nama Karyawan</td>
                            <td><?= $ex['nama']?></td>
                        </tr>
                        <tr>
                            <td>4. </td>
                            <td>Gaji Pokok</td>
                            <td>Rp. <?= $ex['gaji_pokok']?></td>
                        </tr>
                        <tr>
                            <td>5. </td>
                            <td>Gaji Bonus</td>
                            <td>Rp. <?= $ex['gaji_bonus']?></td>
                        </tr>
                        <tr>
                            <td>6. </td>
                            <td>Total Gaji</td>
                            <td>Rp. <?= $ex['gaji_pokok']+$ex['gaji_bonus']?></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td colspan="2">detail bonus: <br> <?= $ex['detail']?></td>
                        </tr>
                        <tr>
                            <td>8. </td>
                            <td>Tgl Pembayaran</td>
                            <td><?= $ex['tgl_dibayar']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
        <div class="text-right">
            <h5>Mengetahui</h5>
            <br>
            <br>
            <br>
            <br>
            <h6>(.................................)</h6>
        </div>
    </div>
    <?php endforeach?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>