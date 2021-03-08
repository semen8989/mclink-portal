<!-- Create event modal -->
<div class="modal fade" id="createEvent_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="createEvent_form" action="{{ route('hr_calendar.store_event') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_id" class="col-form-label">Company</label>
                    <select class="form-control" name="company_id" id="company_id">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title"></input>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_date">Start Date</label>
                        <input type="text" class="form-control" name="start_date" id="start_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_date">End Date</label>
                        <input type="text" class="form-control" name="end_date" id="end_date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="note">Event Note</label>
                        <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Create Holiday modal -->
<div class="modal fade" id="createHoliday_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Holiday</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="createEvent_form" action="{{ route('hr_calendar.store_holiday') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_id" class="col-form-label">Company</label>
                    <select class="form-control" name="company_id" id="company_id">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">Event Name</label>
                    <input type="text" class="form-control" name="event_name" id="event_name"></input>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_date">Start Date</label>
                        <input type="text" class="form-control" name="h_start_date" id="h_start_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_date">End Date</label>
                        <input type="text" class="form-control" name="h_end_date" id="h_end_date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="note">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="published">Published</option>
                        <option value="unpublished">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
