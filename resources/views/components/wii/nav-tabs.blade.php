<ul class="nav nav-tabs" id="myTab1" role="tablist">
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == '') ? 'active' : '' }}" id="submitWiiTabLnk" href="{{ route('wii.create') }}" role="tab" aria-controls="submitWii">Submit Wii</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'my-wii') ? 'active' : '' }}" id="myWiiTabLink" href="{{ route('wii.my_wii') }}" role="tab" aria-controls="myWii">My Wii</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'completed-wii') ? 'active' : '' }}" id="completedWiiTabLink" href="#" role="tab" aria-controls="completedWii">Completed Wii</a></li>
    @if(auth()->user()->id == 1)
        <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'all-wii') ? 'active' : '' }}" id="allWiiTabLink" href="{{ route('wii.all_wii') }}" role="tab" aria-controls="allWii">All Wii</a></li>
    @endif
</ul>