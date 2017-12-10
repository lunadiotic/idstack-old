<div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-confirm-title">Delete confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="modal-confirm-body">
                <form>
                    {{ csrf_field() }}
                </form>
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="modal-btn-close" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" id="modal-confirm-btn-remove" class="btn btn-danger waves-effect waves-light">Delete</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->