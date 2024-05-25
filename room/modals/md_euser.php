<!-- Modal tambah brankas !-->
<div class="modal fade" id="md_euser" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md" role="document" data-backdrop="static">
        <div class="modal-content" id="md_euser">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_euser.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <input type="hidden" id="id_user" name="id_user">
                            <label for="em_user" class="control-label">Email</label>
                            <input type="email" class="form-control" id="em_user" name="em_user" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label for="ps_user" class="control-label">Password</label>
                            <input type="text" class="form-control" name="ps_user">
                            <small class="text-danger">Kosongkan Jika Tidak Diubah</small>
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