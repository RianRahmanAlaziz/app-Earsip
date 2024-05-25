<!-- Modal tambah brankas !-->
<div class="modal fade" id="md_tbrankas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_tbrankas">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Brankas Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_tbrankas.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Judul</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="jd_brankas" id="jd_brankas" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Keterangan</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="kt_brankas" id="kt_brankas" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Deskripsi</label>
                            <textarea class="form-control" name="ds_brankas" id="ds_brankas"></textarea>
                            <input type="hidden" name="wk_brankas" value="<?= date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Warna Header</label>
                            <select class="form-control" name="warna" id="warna">
                                <option value="success">Hijau</option>
                                <option value="info">Biru</option>
                                <option value="danger">Merah</option>
                                <option value="warning">Kuning</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Pilih Bagian</label>
                            <select class="form-control" name="bg_brankas" id="bg_brankas">
                                <option value="Umum">Umum</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Penyediaan-darah">Penyediaan Darah</option>
                                <option value="uji-mutu">Uji Mutu</option>
                                <option value="Pelayanan-darah">Pelayanan Darah</option>
                                <option value="Pemastian-mutu">Pemastian Mutu</option>
                            </select>
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