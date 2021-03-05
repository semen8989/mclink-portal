<!-- View event modal -->
<div class="modal fade" id="viewEvent_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Event Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
                <div class="col-md-4">
                    <input class="form-control-plaintext label" readonly value="Company">
                </div>
                <div class="col-md-8">
                    <input class="form-control-plaintext" id="view_company" name="view_company" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <input class="form-control-plaintext label" readonly value="Event Title">
                </div>
                <div class="col-md-8">
                    <input class="form-control-plaintext" id="view_title" name="view_title" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <input class="form-control-plaintext label" readonly value="Event Start Date">
                </div>
                <div class="col-md-8">
                    <input class="form-control-plaintext" id="view_start_date" name="view_start_date" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <input class="form-control-plaintext label" readonly value="Event End Date">
                </div>
                <div class="col-md-8">
                    <input class="form-control-plaintext" id="view_end_date" name="view_end_date" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <input class="form-control-plaintext label" readonly value="Event Note">
                </div>
                <div class="col-md-8">
                    <input class="form-control-plaintext" id="view_note" name="view_note" readonly>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>