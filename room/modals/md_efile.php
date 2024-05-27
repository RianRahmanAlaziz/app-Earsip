<!-- Modal tambah brankas !-->
<div class="modal fade" id="md_efile" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_efile">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_efile.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Nama File</label>
                            <small class="text-danger">*</small>
                            <input type="hidden" name="id_file" id="id_file">
                            <input type="text" class="form-control" name="nm_file" id="nm_file" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Tanggal Produksi</label>
                            <small class="text-danger">*</small>
                            <input type="date" class="form-control" name="produksi" id="produksi" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Tanggal Expired</label>
                            <small class="text-danger">*</small>
                            <input type="date" class="form-control" name="expired" id="expired" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Brankas</label>
                            <small class="text-danger">*</small>
                            <?php
                            $db = 'brankas';
                            $Pilihbrankas = "SELECT * FROM $db";
                            $Querybrankas = mysqli_query($conn, $Pilihbrankas); ?>
                            <select class="form-control" name="id_brankas" id="id_brankas" required="required" />
                            <option value="">- Pilih -</option>
                            <?php while ($dbr = mysqli_fetch_object($Querybrankas)) { ?>
                                <option value="<?= $dbr->id_brankas; ?>"><?= $dbr->jd_brankas; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Visibilitas</label>
                            <small class="text-danger">*</small>
                            <input type="hidden" name="tg_upload" id="tg_upload" value="<?= date('Y-m-d'); ?>">
                            <select class="form-control" name="visibilitas" id="visibilitas" required="required" />
                            <option value="">- Pilih -</option>
                            <option value="Rahasia">Rahasia</option>
                            <option value="Publik">Publik</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-outline-success" name="edit" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal tambah brankas !-->