<!-- Modal tambah pengguna !-->
<div class="modal fade" id="md_add_user" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_tuser.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Nama</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="nm_user" id="nm_user" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Email</label>
                            <small class="text-danger">*</small>
                            <input type="email" class="form-control" name="em_user" id="em_user" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Password</label>
                            <small class="text-danger">*</small>
                            <input type="password" class="form-control" name="ps_user" id="ps_user" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Role</label>
                            <small class="text-danger">*</small>
                            <select class="form-control" name="rl_user" id="rl_user" required>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Umum">Umum</option>
                                <option value="Penyediaan-darah">Penyediaan Darah</option>
                                <option value="Uji-mutu">Uji Mutu</option>
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
<!-- Modal tambah pengguna !-->