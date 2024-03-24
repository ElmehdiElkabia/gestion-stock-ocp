<x-app-layout :assets="$assets ?? []">

        <?php
        $id = $id ?? null;
        ?>
        @if(isset($id))
        {!! Form::model($data, ['route' => ['users.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
        @else
        {!! Form::open(['route' => ['users.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="profile-img-edit position-relative text-center">
                                <img src="{{ $profileImage ?? asset('images/avatars/01.png')}}" alt="User-Profile" class="profile-pic rounded avatar-100" style="width: 250px; height: auto;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center justify-content-between">
                        <a class="btn btn-info" href="{{ route('download-Imobilisable-pdf', $imobilisables->id) }}">Download PDF</a><br>
                            <div>
                                <a class="btn btn-warning" href="{{ route('imobilisables.edit', $imobilisables->id) }}">Edit</a><br>
                                <br><form action="{{ route('imobilisables.destroy', $imobilisables->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{$id !== null ? 'Update' : 'New' }} User Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{route('users.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="fname">	code matricule : <span class="text-danger">{{ $imobilisables->code_matricule }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="fname">	Numero commande : <span class="text-danger">{{ $imobilisables->numero_commande }}</span></h6>
                                </div>

                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="fname">	Date reception : <span class="text-danger">{{ $imobilisables->date_reception }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="fname">	Date fin garantie : <span class="text-danger">{{ $imobilisables->date_fin_garantie }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname">Quantite: <span class="text-danger"> {{ $imobilisables->quantite }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname">Suite securite: <span class="text-danger"> {{ $imobilisables->suivre_sucrete }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname">Fournisseur: <span class="text-danger"> {{ $imobilisables->fournisseur }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname">Numero Bille: <span class="text-danger"> {{ $imobilisables->numero_bille }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="fname">	Affectation_SA : <span class="text-danger">{{ $imobilisables->affectation_SA }}</span></h6>
                                </div>

                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname"> DMS PVES: <span class="text-danger"> {{ $imobilisables->DMS_PVES }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname">Cout: <span class="text-danger"> {{ $imobilisables->cout }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname">Category: <span class="text-danger"> {{ $imobilisables->category }}</span></h6>
                                </div>
                                <div class="form-group col-md-6">
                                <h6 class="form-label" for="fname">Description: <h6>{{ $imobilisables->description}}</h6></h6>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="form-label" for="lname">Emplacement: <span class="text-danger"> {{ $imobilisables->emplacement }}</span></h6>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <form action="{{ route('imobilisables.show', $imobilisables->id) }}" method="GET">
                                    <!-- Your form fields here -->
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="newQuantity">sourte the  Quantity:</label>
                                        <input type="text" class="form-control" id="newQuantity" name="newQuantity">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <br><button class="btn btn-primary" type="submit">sourte</button>
                                    </div>
                                </form>
                            <div/>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
</x-app-layout>