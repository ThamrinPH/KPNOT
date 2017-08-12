<div id="modal_delete" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content panel-danger">

            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Yakin hapus?</h4>
            </div>
            <div class="modal-body">
                <p>Data yang sudah dihapus tidak dapat dikembalikan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <form method="post" action="{{route($route.'_set')}}" id="form_delete" style="display:inline">
                    <input type="hidden" value="delete" name="action">
                    <input type="hidden" value="" name="id" id="delete_id">
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-danger" value="Hapus">
                </form>
            </div>
        </div>
    </div>
</div>