<x-base-layout>
    <!--begin::Tables Widget 9-->
    <div class="card">
        <!--begin::Header-->
        <div id="cabecalho" class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Usuários</span>
                {{-- <span class="text-muted mt-1 fw-bold fs-7">{{ RolesEnum::SUPER_ADMIN->label() }}:
                    {{ RolesEnum::countUsers(RolesEnum::SUPER_ADMIN) }}</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{ RolesEnum::ADMIN->label() }}:
                    {{ RolesEnum::countUsers(RolesEnum::ADMIN) }}</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{ RolesEnum::USER->label() }}:
                    {{ RolesEnum::countUsers(RolesEnum::USER) }}</span> --}}
            </h3>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-150px">Nome</th>
                            <th class="min-w-140px">CPF</th>
                            <th class="min-w-120px">Função</th>
                            <th class="min-w-100px text-end">Ação</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#"
                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $user->name }}</a>

                                            <span
                                                class="text-muted fw-bold text-muted d-block fs-7">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a href="#"
                                        class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $user->cpf }}</a>

                                </td>
                                <td>
                                    <div>
                                        <input type="text" name="userId" value="{{ $user->id }}" hidden>
                                        <select class="form-select form-select-solid text-center" name="funcao"
                                            onchange="atualizarFuncao(this)" required>
                                            <option selected disabled>{{ $user->role->label() }}</option>
                                            @foreach (RolesEnum::cases() as $role)
                                                <option value={{ $role->value }}>{{ $role->label() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>

                                <td class="d-flex gap-2 justify-content-center">
                                    <a id="editar" href="{{route('users.edit', $user)}}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->
    @section('scripts')
        <script>
            function atualizarFuncao(select) {
                const divMaisProxima = $(select).closest('div')
                const userId = divMaisProxima.find('input[name="userId"]').val()
                const funcao = divMaisProxima.find('select[name="funcao"]').val()
                $.ajax({
                    url: "{{ route('users.alterar-funcao') }}",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "usuario": userId,
                        "funcao": funcao,
                    },
                    success: function(data) {
                        if (data.success) {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    }
                });
            }
        </script>
    @endsection
</x-base-layout>
