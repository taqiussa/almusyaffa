<div>
    <x-slot name="header">
        Form Tambah Menu
    </x-slot>
    <form wire:submit.prevent="save">
        <div class="d-flex justify-content-between">
            <div class="select-style-1 col-5">
                <label>Category</label>
                <div class="select-position">
                    <select wire:model="header">
                        <option value="">Select category</option>
                        @foreach ($headers as $header)
                            <option value="{{ $header->id }}">{{ $header->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('header')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-style-1 col-6">
                <label>Menu Name</label>
                <input wire:model.defer="menuName" type="text" placeholder="Menu Name" />
                @error('menuName')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="input-style-1 col-5">
                <label>Icon Name</label>
                <input wire:model.defer="iconName" type="text" placeholder="Icon Name" />
            </div>
            @if (!$subMenus)
            <div class="input-style-1 col-6">
                <label>Menu Route Name</label>
                <input wire:model.defer="routeName" type="text" placeholder="Menu Route Name" />
            </div>
            @endif
        </div>
        <!-- end input -->
        @foreach ($subMenus as $index => $subMenu)
            <div class="d-flex justify-content-between">
                <div class="input-style-3 col-lg-5">
                    <span class="icon"><i class="lni lni-arrow-right"></i></span>
                    <input wire:model="subMenus.{{ $index }}.name" type="text" placeholder="Sub Menu" />
                </div>
                <div class="input-style-3 col-lg-4">
                    <span class="icon"><i class="lni lni-arrow-right"></i></span>
                    <input wire:model="subMenus.{{ $index }}.route" type="text" placeholder="Sub Menu Route" />
                </div>
                <div class="col-lg-2">
                    <a wire:click.prevent="deleteSubMenu({{ $index }})"
                        class="nav-link text-danger" role="button">Delete</a>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-between">
            <button wire:click.prevent="addSubMenu" class="btn btn-success">Add <i
                    class="lni lni-plus"></i></button>
            <button wire:click.prevent="save" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
