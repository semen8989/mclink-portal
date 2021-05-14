<!-- Create event modal -->
<div class="modal fade" id="createEvent_modal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('label.add_event') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="createEvent_form" action="{{ route('hr_calendar.store_event') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_id" class="col-form-label">{{ __('label.company') }}</label>
                    <select class="form-control select2" name="company_id">
                        <option></option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">{{ __('label.title') }}</label>
                    <input type="text" class="form-control" name="title"></input>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_date">{{ __('label.start_date') }}</label>
                        <input type="text" class="form-control date" name="start_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_date">{{ __('label.end_date') }}</label>
                        <input type="text" class="form-control date" name="end_date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="note">{{ __('label.event_note') }}</label>
                        <textarea class="form-control tinymce-editor" name="note" id="note" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('label.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Create Holiday modal -->
<div class="modal fade" id="createHoliday_modal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('label.add_holiday') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="createHoliday_form" action="{{ route('hr_calendar.store_holiday') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_id" class="col-form-label">{{ __('label.company') }}</label>
                    <select class="form-control select2" name="company_id">
                        <option></option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">{{ __('label.event_name') }}</label>
                    <input type="text" class="form-control" name="event_name"></input>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_date">{{ __('label.start_date') }}</label>
                        <input type="text" class="form-control date" name="start_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_date">{{ __('label.end_date') }}</label>
                        <input type="text" class="form-control date" name="end_date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="note">{{ __('label.description') }}</label>
                    <textarea class="form-control tinymce-editor" name="description" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">{{ __('label.status') }}</label>
                    <select class="form-control select2" name="status">
                            <option></option>
                        @foreach($status as $statusName => $statusId)
                            <option value="{{ $statusId }}">{{ ucfirst($statusName) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('label.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
