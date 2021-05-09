<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">

        @if(auth()->user()->is_admin)

            <li class="c-sidebar-nav-title">{{ __('Mange Checklists')}}</li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('admin.checklist_group.create')}}">{{__('New Checklist Group')}}</a>
            </li>
        @foreach(\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
                    <a class="c-sidebar-nav-link"
                       href="{{route('admin.checklist_group.edit',$group->id)}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg> {{$group->name}}</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @foreach($group->checklists as $checklist)
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link"
                               href="{{route('admin.checklist_group.checklists.edit',[$checklist->checklist_group_id,$checklist->id])}}">
                                <span class="c-sidebar-nav-icon"></span>
                                {{$checklist->name}}
                            </a>

                        </li>
                        @endforeach
                            <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link"
                                   href="{{route('admin.checklist_group.checklists.create',$group)}}">
                                    {{__('New Checklist')}}
                                </a>
                            </li>
                    </ul>
                </li>
            @endforeach

            <li class="c-sidebar-nav-title">{{ __('Pages')}}</li>
            @foreach(\App\Models\Page::all() as $page)
                <li class="c-sidebar-nav-item ">
                    <a class="c-sidebar-nav-link"
                       href="{{route('admin.pages.edit',$page)}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg> {{ $page->title}}</a>
                </li>
            @endforeach
        @endif
        <li class="c-sidebar-nav-title">{{ __('Other')}}</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg> {{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>




    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
