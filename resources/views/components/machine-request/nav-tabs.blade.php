<ul class="nav nav-tabs" id="myTab1" role="tablist">
    <li class="nav-item"><a class="nav-link {{ (request()->segment(2) == 'create-request') ? 'active' : '' }}" id="requestTabLnk" href="{{ route('machine_request.create_request') }}" role="tab" aria-controls="request">Create Request</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(2) == 'pending-request') ? 'active' : '' }}" id="pendingTabLink" href="{{ route('machine_request.pending_request') }}" role="tab" aria-controls="pending">Pending</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(2) == 'completed-request') ? 'active' : '' }}" id="completedTabLink" href="{{ route('machine_request.completed_request') }}" role="tab" aria-controls="completed">Completed</a></li>
</ul>