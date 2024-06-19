<!-- Modal tambah brankas !-->
<div class="modal fade" id="md_ubahstatus" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_ubahstatus">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Diterima?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_ubahstatus.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="file_id" name="file_id">
                            <input type="hidden" id="p_id" name="p_id">
                            <input type="hidden" id="btn" name="btn">
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