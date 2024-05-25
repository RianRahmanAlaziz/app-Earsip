<div class="modal fade" id="md_eberkas">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_eberkas">
            <div class="modal-header">
                <h5 class="modal-title">Ganti File</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_eberkas.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_file" id="id_file">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <label for="file_skl">File</label>
                            <input type="checkbox" checked="checked" name="upload_file" required="required" />
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="file_up" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.rar,.zip,.jpg,.jpeg,.bmp,.png,.mp4,.mp3,.mpeg-1,.mpeg-2,.mpeg-4,.avi,.wmv">
                                <label class="custom-file-label" for="file_up">Pilih File</label>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" name="edit" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>