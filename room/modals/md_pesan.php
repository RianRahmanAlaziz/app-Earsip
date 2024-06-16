<!-- Modal tambah brankas !-->
<div class="modal fade" id="md_pesan" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_pesan">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah pesan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_tpesan.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="text" id="id_file" name="id_file">
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Pengirim</label>
                            <small class="text-danger">*</small>
                            <input type="hidden" id="id_pengirim" name="id_pengirim" value="<?= isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ''; ?>">

                            <input type="text" class="form-control" name="pengirim" id="pengirim" value="<?php echo isset($_SESSION['nm_user']) ? $_SESSION['nm_user'] : ''; ?>" readonly required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Penerima Bagian</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="penerima" id="penerima" value="<?= $nama_brankas; ?>" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">pesan</label>
                            <textarea class="form-control" name="pesan" id="pesan"></textarea>
                            <input type="hidden" name="tgl" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-outline-success" name="simpan" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal tambah brankas !-->