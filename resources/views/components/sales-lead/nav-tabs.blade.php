<ul class="nav nav-tabs" id="myTab1" role="tablist">
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'create' || request()->segment(3) == '') ? 'active' : '' }}" href="{{ route('sales_lead.index') }}" role="tab" aria-controls="sales-lead">Sales Lead</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'assign') ? 'active' : '' }}" href="{{ route('sales_lead.assign_index') }}" role="tab" aria-controls="assign">Assign</a></li>
    <li class="nav-item"><a class="nav-link" href="#" role="tab" aria-controls="assign-to-me">Assign To Me</a></li>
    <li class="nav-item"><a class="nav-link" href="#" role="tab" aria-controls="approval">Approval</a></li>
</ul>