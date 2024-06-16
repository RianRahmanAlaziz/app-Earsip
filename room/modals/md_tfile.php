<!-- Modal tambah brankas !-->
<div class="modal fade" id="md_tfile" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_tfile">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah File Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_tfile.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Nama File</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="nm_file" id="nm_file" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Tanggal Dokumen</label>
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
                            $role = $_SESSION['rl_user'];
                            $b = mysqli_query($conn, "SELECT * FROM brankas WHERE id_brankas='" . $_GET['brankas'] . "' ");
                            $j = mysqli_fetch_object($b);
                            $db = 'brankas';
                            if ($role == $j->bg_brankas || $role == 'Admin') {
                                $Pilihbrankas = "SELECT * FROM $db WHERE bg_brankas='$j->bg_brankas'";
                            }
                            $Querybrankas = mysqli_query($conn, $Pilihbrankas); ?>
                            <select class="form-control" name="id_brankas" required="required" />
                            <option value="">- Pilih -</option>
                            <?php while ($dbr = mysqli_fetch_object($Querybrankas)) { ?>
                                <option value="<?= $dbr->id_brankas; ?>"><?= $dbr->jd_brankas; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label for="file_skl">File</label>
                            <input type="checkbox" checked="checked" name="upload_file" required="required" />
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="file_up" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.rar,.zip,.jpg,.jpeg,.bmp,.png,.mp4,.mp3,.mpeg-1,.mpeg-2,.mpeg-4,.avi,.wmv">
                                    <label class="custom-file-label" for="file_up">Pilih File</label>
                                </div>
                            </div>
                            <input type="hidden" name="tg_upload" value="<?= date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Visibilitas</label>
                            <small class="text-danger">*</small>
                            <select class="form-control" name="visibilitas" required="required" />
                            <option value="">- Pilih -</option>
                            <option value="Rahasia">Rahasia</option>
                            <option value="Publik">Publik</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-outline-success" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal tambah brankas !-->