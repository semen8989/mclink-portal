<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label font-weight-bold" for="csrNo">CSR No. <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <input class="form-control @error('csrNo') is-invalid @enderror" name="csrNo" id="csrNo" type="text" value="{{ old('csrNo', $csrNo ?? $serviceReport->csr_no) }}">
            @error('csrNo')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label font-weight-bold" for="date">Date <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <input class="form-control @error('date') is-invalid @enderror" name="date" id="date" type="text" value="{{ old('date', $csrNo ?: $serviceReport->date) ? date('d/m/Y H:i A', strtotime(old('date', $csrNo ?: $serviceReport->date))) : '' }}">
            @error('date')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="isNewCustomer"  id="isNewCustomer" value="true" {{ !old('isNewCustomer') ?: 'checked'  }}>
            <label class="custom-control-label" for="isNewCustomer">Add new customer</label>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label font-weight-bold" for="customer">Customer Name <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <select class="form-control custom-select @error('customer') is-invalid @enderror" name="customer" id="customer">
            @if ($serviceReport)
                <option value="{{ $serviceReport->customer_id }}" selected>
                {{ $serviceReport->customer->name }}
                </option>
            @endif
            </select>
            @error('customer')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
            
            <input class="form-control @error('newCustomer') is-invalid @enderror" name="newCustomer" id="newCustomer" value="{{ old('newCustomer') }}" type="{{ old('isNewCustomer') ? 'text' : 'hidden' }}" {{ old('isNewCustomer') ?: 'disabled' }}> 
            @error('newCustomer')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label" for="custEmail">Customer Email</label>
        <div class="controls">
            <input class="form-control @error('custEmail') is-invalid @enderror" name="custEmail" id="custEmail" type="email" value="{{ old('custEmail', $csrNo ? '' : $serviceReport->customer->email) }}"> 
            @error('custEmail')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label class="col-form-label font-weight-bold" for="address">Address <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="5">{{ old('address', $csrNo ? '' : $serviceReport->customer->address) }}</textarea>
            @error('address')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label" for="engineerId">Engineer Name <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <select class="form-control custom-select @error('engineerId') is-invalid @enderror" name="engineerId" id="engineerId">
            @if ($serviceReport)
                <option value="{{ $serviceReport->engineer_id }}" selected>
                {{ $serviceReport->user->name }}
                </option>
            @endif
            </select>
            @error('engineerId')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label" for="ticketReference">Ticket No. Reference</label>
        <div class="controls">
            <input class="form-control @error('ticketReference') is-invalid @enderror" name="ticketReference" id="ticketReference" type="text" value="{{ old('ticketReference', $csrNo ? '' : $serviceReport->ticket_reference) }}"> 
            @error('ticketReference')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label class="col-form-label" for="serviceRendered">Service Rendered <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('serviceRendered') is-invalid @enderror" name="serviceRendered" id="serviceRendered">{{ old('serviceRendered', $csrNo ? '' : $serviceReport->service_rendered) }}</textarea>
            @error('serviceRendered')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label" for="engineerRemark">Engineer's Remarks</label>
        <div class="controls">
            <textarea class="form-control @error('engineerRemark') is-invalid @enderror" name="engineerRemark" id="engineerRemark" rows="3">{{ old('engineerRemark', $csrNo ? '' : $serviceReport->engineer_remark) }}</textarea>
            @error('engineerRemark')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label" for="statusAfterService">Status after Service</label>
        <div class="controls">
            <textarea class="form-control @error('statusAfterService') is-invalid @enderror" name="statusAfterService" id="statusAfterService" rows="3">{{ old('statusAfterService', $csrNo ? '' : $serviceReport->status_after_service) }}</textarea>
            @error('statusAfterService')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label" for="serviceStart">Start of Service</label>
        <div class="controls">
            <input class="form-control @error('serviceStart') is-invalid @enderror" name="serviceStart" id="serviceStart" type="text" value="{{ old('serviceStart', $csrNo ? '' : $serviceReport->service_start) ? date('d/m/Y H:i A', strtotime(old('serviceStart', $csrNo ?: $serviceReport->service_start))) : '' }}"> 
            @error('serviceStart')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label" for="serviceEnd">End of Service</label>
        <div class="controls">
            <input class="form-control @error('serviceEnd') is-invalid @enderror" name="serviceEnd" id="serviceEnd" type="text" value="{{ old('serviceEnd', $csrNo ? '' : $serviceReport->service_end) ? date('d/m/Y H:i A', strtotime(old('serviceEnd', $csrNo ?: $serviceReport->service_end))) : '' }}"> 
            @error('serviceEnd')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label" for="usedItCredit">IT Credit Used</label>
        <div class="controls">
            <input class="form-control @error('usedItCredit') is-invalid @enderror" placeholder="Not Applicable (NA)" name="usedItCredit" id="usedItCredit" data-decimals="1" min="0" max="100" step="0.5" type="number" value="{{ old('usedItCredit', $csrNo ? '' : $serviceReport->used_it_credit) }}"> 
            @error('usedItCredit')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @if ($serviceReport)
    <div class="form-group col-md-6">
        <label class="col-form-label" for="status">Status <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
                @foreach($status as $statusName => $statusId)
                    @if($statusId != 1)
                        <option value="{{ $statusId }}" {{ $statusId == $serviceReport->status ? 'selected' : '' }} >
                            {{ ucfirst($statusName) }}
                        </option>
                    @else
                        @if($serviceReport->status == 1)
                            <option value="{{ $statusId }}" selected disabled>{{ ucfirst($statusName) }}</option>
                        @endif
                    @endif                
                @endforeach
            </select>
            @error('status')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    @else
    <input type="hidden" id="action" name="action">
    @endif
</div>