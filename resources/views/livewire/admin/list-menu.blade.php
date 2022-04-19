<div>
    <x-slot name="header">
        List Menu
    </x-slot>
    <div class="table-wrapper table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <h6>#</h6>
                    </th>
                    <th>
                        <h6>Header Name</h6>
                    </th>
                    <th>
                        <h6>Menu Name</h6>
                    </th>
                    <th>
                        <h6>Sub Menu Name</h6>
                    </th>
                </tr>
                <!-- end table row-->
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td class="min-width">
                            {{ $roles->firstItem() + $key }}
                        </td>
                        <td class="min-width">
                            {{ $role->name }}
                        </td>
                        <td class="min-width">
                            <ul>
                                @foreach ($role->menus as $menu)
                                    <p>
                                        <li class="action">
                                            {{ $menu->name }}
                                            <button wire:click.prevent="confirmDeleteMenu({{ $menu->id }})"
                                                class="text-danger">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </li>
                                    </p>
                                @endforeach
                            </ul>
                        </td>
                        <td class="min-width action">
                            <ul>
                                <p>
                                    @foreach ($role->subMenus as $subMenu)
                                        <li class="my-1">
                                            {{ $subMenu->menu->name . '->' . $subMenu->name }}
                                            <button wire:click="confirmDeleteSubMenu({{ $subMenu->id }})"
                                                class="text-danger">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </li>
                                    @endforeach
                                </p>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- end table -->
    </div>
    <div class="my-2 mx-2">
        {{ $roles->links() }}
    </div>
</div>
