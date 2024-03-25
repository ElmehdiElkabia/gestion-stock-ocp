<x-app-layout :assets="$assets ?? []">


    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">image</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="profile-img-edit position-relative text-center">
                            <img src="/storage/{{ $imobilisable->image }}" alt="User-Profile"
                                class="profile-pic rounded avatar-100" style="width: 250px; height: auto;">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex align-items-center justify-content-between">
                        <a class="btn btn-danger" href="{{ route('imobilisables.pdf', $imobilisable->id) }}">Download
                            PDF</a><br>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Information {{ $imobilisable->code_matricule }}</h4>
                    </div>
                    <div class="card-action">
                        <a href="{{ route('imobilisables.index') }}" class="btn btn-sm btn-primary"
                            role="button">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="code_article">Code article: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="code_article" name="code_article"
                                    value="{{ $imobilisable->code_matricule }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="description">Description:</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value=" {{ $imobilisable->description }}" placeholder="Enter description" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="affectation_SA">Affectation SA:</label>
                                <select class="form-control" id="affectation_SA" name="affectation_SA" disabled>
                                    <option value="{{ $imobilisable->affectation_SA }}">{{ $imobilisable->affectation_SA }}
                                    </option>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="date_reception">Date Réception:<span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_reception"
                                    value="{{ $imobilisable->date_reception }}" name="date_reception" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="date_fin_garantie">Date Garantie:</label>
                                <input type="date" class="form-control" id="date_fin_garantie"
                                    value="{{ $imobilisable->date_fin_garantie }}" name="date_fin_garantie" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="numero_commande">Numéro Commande: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="numero_commande"
                                    value=" {{ $imobilisable->numero_commande }}" name="numero_commande" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="fournisseur">Fournisseur:</label>
                                <input type="text" class="form-control" id="fournisseur" name="fournisseur"
                                    value=" {{ $imobilisable->numero_commande }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="numero_bille">Numéro Bille: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="numero_bille" name="numero_bille"
                                    value=" {{ $imobilisable->numero_bille }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="quantite">Quantité: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="quantite" name="quantite"
                                    value="{{ $imobilisable->quantite }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="suivre_securite">Suivre sécurité:</label>
                                <input type="text" class="form-control" id="suivre_sucrete"
                                    value=" {{ $imobilisable->suivre_sucrete }}" name="suivre_sucrete" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="DMS_PVRD">DMS PVRD:</label>
                                <input type="text" class="form-control" id="DMS_PVES" name="DMS_PVES"
                                    value=" {{ $imobilisable->numero_commande }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="cout">Coût:</label>
                                <input type="text" class="form-control" id="cout" name="cout"
                                    value=" {{ $imobilisable->numero_commande }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="emplacement">Emplacement: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="emplacement"
                                    value=" {{ $imobilisable->emplacement }}" name="emplacement" disabled>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-3">Quantité</h5>
                        <form action="{{ route('imobilisables.show', $imobilisable->id) }}" method="post" class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="SortieQuantité">Quantité à soustraire:</label>
                                <input type="number" class="form-control" id="SortieQuantité" name="SortieQuantité"
                                    placeholder="Quantité à soustraire" required>
                            </div>
                            <div class="form-group col-md-6">
                                <br>
                                <button class="btn btn-primary" type="submit">Soustraire</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
