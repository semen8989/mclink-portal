<ul class="nav nav-tabs" id="myTab1" role="tablist">
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'mca-indoctrination') ? 'active' : '' }}" id="indoctrinationTabLnk" href="{{ route('handbook.mca_indoctrination') }}" role="tab" aria-controls="indoctrination">MCA Indoctrination</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'ph-handbook') ? 'active' : '' }}" id="phHandbookTabLink" href="{{ route('handbook.ph_handbook') }}" role="tab" aria-controls="phHandbook">PH Handbook</a></li>
    <li class="nav-item"><a class="nav-link {{ (request()->segment(3) == 'ch-handbook') ? 'active' : '' }}" id="chHandbookTabLink" href="{{ route('handbook.ch_handbook') }}" role="tab" aria-controls="chHandbook">CH Handbook</a></li>
</ul>