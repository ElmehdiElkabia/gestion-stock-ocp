@section('title', ' Tableau tout Securite imobilisable')
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Securite imobilisable </h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid"
                                data-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        <th>Code matricule</th>
                                        <th>Quantite</th>
                                        <th>Suite securite</th>
                                        <th>Numero Bille</th>
                                        <th style="min-width: 100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Securite as $consomable)
                                        @if ($consomable->suivre_sucrete >= $consomable->quantite)
                                            <tr>
                                                <td> {{ $consomable->code_matricule }} </td>
                                                <td>{{ $consomable->quantite }}</td>
                                                <td>{{ $consomable->suivre_sucrete }}</td>
                                                <td>{{ $consomable->numero_bille }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center list-user-action">
                                                        <button class="btn btn-sm btn-icon btn-info commande-button"
                                                            onclick="handleCommandeButtonClick('{{ route('imobilisables.commande.export', $consomable->id) }}')"
                                                            data-toggle="tooltip" data-placement="top" title="View">commande</button>
                                                        <button class="btn btn-sm btn-icon btn-warning"
                                                            onclick="handleResptionButtonClick('{{ route('imobilisables.commande', $consomable->id) }}')"
                                                            data-toggle="tooltip" data-placement="top" title="Edit">resption</button>
                                                    </div>
                                                
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function handleCommandeButtonClick(url) {
        // Disable the commande button
        document.querySelectorAll('.commande-button').forEach(button => {
            button.disabled = true;
        });
        // Redirect to the specified URL
        window.location.href = url;
    }

    function handleResptionButtonClick(url) {
        // Redirect to the specified URL
        window.location.href = url;
    }
</script>
