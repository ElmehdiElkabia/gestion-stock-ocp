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
                            <a class="btn btn-info" href="{{ route('download-Consomable-pdf', $consomable->id) }}">Download PDF</a><br>
                            <div>
                                <a class="btn btn-warning" href="{{ route('consomables.edit', $consomable->id) }}">Edit</a><br>
                                <br><form action="{{ route('consomables.destroy', $consomable->id) }}" method="POST">
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
                                    <h5 class="form-label" for="fname">code article: <span class="text-danger">{{ $consomable->code_article }}</span></h5>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <h5 class="form-label" for="lname">Quantite: <span class="text-danger"> {{ $consomable->quantite }}</span></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="form-label" for="lname">Suite securite: <span class="text-danger"> {{ $consomable->suivre_sucrete }}</span></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="form-label" for="lname">Suite securite: <span class="text-danger"> {{ $consomable->suivre_sucrete }}</span></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="form-label" for="lname"> Date Reception: <span class="text-danger"> {{ $consomable->date_reception }}</span></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="form-label" for="lname">Date Fin: <span class="text-danger"> {{ $consomable->date_fin_garantie }}</span></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="form-label" for="lname">Numero Commande: <span class="text-danger"> {{ $consomable->numero_commande }}</span></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="form-label" for="lname">Numero Bille: <span class="text-danger"> {{ $consomable->numero_bille }}</span></h5>
                                </div>
                                <div class="form-group col-md-6
                                <div class=" form-group col-md-6">
                                    <h5 class="form-label" for="lname">Emplacement: <span class="text-danger"> {{ $consomable->emplacement }}</span></h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <form action="{{ route('consomables.show', $consomable->id) }}" method="GET">
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
        </div>
        {!! Form::close() !!}
</x-app-layout>