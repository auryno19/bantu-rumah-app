<div class="left-sidebar">
    <div class="slimscroll-menu">
        <div class="list-group list-group-transparent mb-0">

            <span class="list-group-item disabled">
                Getting Started
            </span>

            <a href="/admin/asistant" class="list-group-item list-group-item-action {{ request()->is('admin/asistant') ? ' active' : '' }}">
                <span class="mr-2">
                    <i class="fa-solid fa-users"></i>
                </span>Asistants
            </a>

            <a href="/admin/asistant/create" class="list-group-item list-group-item-action {{ request()->is('admin/asistant/create') ? ' active' : '' }}">
                <span class="mr-2">
                    <i class="fa-solid fa-user-plus"></i>
                </span>Add Asistant
            </a>

        </div>
    </div>
</div>