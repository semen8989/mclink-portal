<ul class="nav nav-tabs" id="myTab1" role="tablist">
    <li class="nav-item"><a class="nav-link {{ (request()->segment(2) != 'my-wii' || request()->segment(2) != 'completed-wii') ? 'active' : '' }}" id="submitWiiTabLnk" href="#" role="tab" aria-controls="submitWii">Submit Wii</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(2) == 'my-wii') ? 'active' : '' }}" id="myWiiTabLink" href="#" role="tab" aria-controls="myWii">My Wii</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(2) == 'completed-wii') ? 'active' : '' }}" id="completedWiiTabLink" href="#" role="tab" aria-controls="completedWii">Completed Wii</a></li>
</ul>