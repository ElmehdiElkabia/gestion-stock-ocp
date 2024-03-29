@section('title', ' Modifier une consommable')
<x-app-layout :assets="$assets ?? []">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Modifier une consommable</h4>
                    </div>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('consomables.commande', $consomable->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="new-user-info">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="numero_bille">Numéro Bille: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="numero_bille" name="newNumerobille" placeholder="Enter Numéro Bille" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="quantite">Quantité: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="quantite" name="newQuantity" placeholder="Enter Quantité" required>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>