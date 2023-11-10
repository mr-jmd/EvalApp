<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="text-sm text-gray-500"
    >
        Administracion de Avaluos
    </div>

    <x-sidebar.link title="Contratistas " href="{{ route('contractor') }}" />
    <x-sidebar.link title="Clientes " href="{{ route('customer') }}" />
    <x-sidebar.link title="Contratos " href="{{ route('contract') }}" />
    <x-sidebar.link title="Proyectos " href="{{ route('projects') }}" />
    <x-sidebar.link title="Avaluos " href="{{ route('apparaisal') }}" />

    <x-sidebar.dropdown
        title="Administrar"
        :active="Str::startsWith(request()->route()->uri(), 'users')"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Usuarios"
            href="{{ route('users') }}"
            :active="request()->routeIs('users')"
        />
    </x-sidebar.dropdown>

</x-perfect-scrollbar>
