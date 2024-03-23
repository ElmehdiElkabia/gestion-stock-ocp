@section('title', ' Créer Nouvelle consommable')
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Ajouter une nouvelle consommable</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('consomables.index') }}" class="btn btn-sm btn-primary"
                                role="button">Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('consomables.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="code_article">Code article: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="code_article" name="code_article"
                                            placeholder="Entrer le code article">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="description">Description:</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="Enter description" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="affectation_SA">Affectation SA:</label>
                                        <select class="form-control" id="affectation_SA" name="affectation_SA">
                                            @foreach ($affectations as $option)
                                                <option value="{{ $option->option }}">{{ $option->option }}</option>
                                            @endforeach
                                            <option value="other">Other</option>
                                        </select>
                                        <input type="text" class="form-control" id="other_affectation"
                                            name="other_affectation" placeholder="Enter other affectation"
                                            style="display: none;">
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="date_reception">Date Réception:<span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="date_reception"
                                            name="date_reception" placeholder="Select date reception" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="date_fin_garantie">Date Garantie:</label>
                                        <input type="date" class="form-control" id="date_fin_garantie"
                                            name="date_fin_garantie" placeholder="Select date fin garantie">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="numero_commande">Numéro Commande: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="numero_commande"
                                            name="numero_commande" placeholder="Enter Numéro Commande">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="fournisseur">Fournisseur:</label>
                                        <input type="text" class="form-control" id="fournisseur" name="fournisseur"
                                            placeholder="Enter Fournisseur">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="numero_bille">Numéro Bille: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="numero_bille" name="numero_bille"
                                            placeholder="Enter Numéro Bille">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="quantite">Quantité: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="quantite" name="quantite"
                                            placeholder="Enter Quantité">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="suivre_securite">Suivre sécurité:</label>
                                        <input type="text" class="form-control" id="suivre_sucrete"
                                            name="suivre_sucrete" placeholder="Enter Suivre sécurité">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="DMS_PVRD">DMS PVRD:</label>
                                        <input type="text" class="form-control" id="DMS_PVES" name="DMS_PVES"
                                            placeholder="Enter DMS PVRD">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cout">Coût:</label>
                                        <input type="text" class="form-control" id="cout" name="cout"
                                            placeholder="Enter Coût">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="emplacement">Emplacement: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="emplacement"
                                            name="emplacement" placeholder="Enter Emplacement">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="image">Image:</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Enter Image">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="pdf_file_path">Fichier PDF:</label>
                                        <input type="file" class="form-control" id="pdf_file_path" name="pdf_file_path" placeholder="Sélectionner un fichier PDF">
                                    </div>
                                    
                                </div>
                            </div>
                            <hr>

                            <button type="submit" class="btn btn-primary">
                                ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</x-app-layout>
<script>
    document.getElementById('affectation_SA').addEventListener('change', function() {
        var selectedValue = this.value;
        if (selectedValue === 'other') {
            document.getElementById('other_affectation').style.display = 'block';
            // Here you can set the value for the input field if needed
            // For example:
            document.getElementById('other_affectation').value = "";
        } else {
            document.getElementById('other_affectation').style.display = 'none';
        }
    });
    document.addEventListener("DOMContentLoaded", function() {
        const dateReceptionInput = document.getElementById('date_reception');

        const dateGarantieInput = document.getElementById('date_fin_garantie');

        dateReceptionInput.addEventListener('change', function() {
            const dateReceptionValue = new Date(this.value);

            dateReceptionValue.setMonth(dateReceptionValue.getMonth() + 12);

            const year = dateReceptionValue.getFullYear();
            const month = (dateReceptionValue.getMonth() + 1).toString().padStart(2, '0');
            const day = dateReceptionValue.getDate().toString().padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;

            dateGarantieInput.value = formattedDate;
        });
    });
</script>
