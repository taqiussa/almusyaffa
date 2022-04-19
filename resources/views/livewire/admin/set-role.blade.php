<div>
    <x-slot name="header">
        Set Role Guru
    </x-slot>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Set User Role
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if ($user)
                        <h5>Set Role For User : {{ $user->name }} , user Roles : {{ $user->getRoleNames() }},
                        </h5>
                        @foreach ($roles as $key => $role)
                            <div class="form-check">
                                <input wire:model.defer="roleName.{{ $role->name }}" type="checkbox"
                                    class="form-check-input checked" id="roleName.{{ $key }}"
                                    value="{{ $role->name }}">
                                <label class="form-check-label" for="roleName.{{ $key }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            <button wire:click.prevent="save" type="button" class="btn btn-primary mx-1">Save</button>
                            <button wire:click="$set('user','')" type="button"
                                class="btn btn-secondary mx-1">Cancel</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover table-responsive">
        <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Edit Roles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td scope="row">{{ $users->firstItem() + $key }}</td>
                    <td>{{ $user->name }}
                    </td>
                    <td>
                        <a wire:click="setUserRole({{ $user->id }})" role="button" class="mx-2">
                            <span><i class="fas fa-edit text-primary"></i></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        {{ $users->links() }}
    </div>
</div>
