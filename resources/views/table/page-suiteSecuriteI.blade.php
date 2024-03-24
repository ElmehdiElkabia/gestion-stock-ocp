<x-app-layout :assets="$assets ?? []">
   <div>
       <div class="row">
           <div class="col-sm-12">
               <div class="card">
                   <div class="card-header d-flex justify-content-between">
                       <div class="header-title">
                           <h4 class="card-title">Securite Imobilisable </h4>
                       </div>
                   </div>
                   <div class="card-body px-0">
                       <div class="table-responsive">
                           <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                               <thead>
                               <tr class="ligth">
                                        <th>Code matricule</th>
                                        <th>Quantite</th>
                                        <th>Suite securite</th>
                                        <th>Date Resption</th>
                                        <th>Date Fin </th>
                                        <th>Numero Commande</th>
                                        <th>Numero Bille</th>
                                        <th>Emplacement</th>
                                        <th style="min-width: 100px">Action</th>
                                    </tr>
                               </thead>
                               <tbody>
                                   @foreach($imobilisablessecurite as $imobilisable)
                                   @if($imobilisable->suivre_sucrete >= $imobilisable->quantite) 
                                           <tr>
                                               <td>
                                                   <a href="{{ route('imobilisables.show', $imobilisable->id) }}">{{ $imobilisable->code_matricule }}</a>
                                                   </td>
                                                    <td>{{ $imobilisable->quantite }}</td>
                                                    <td>{{ $imobilisable->suivre_sucrete }}</td>
                                                    <td>{{ $imobilisable->date_reception }}</td>
                                                    <td>{{ $imobilisable->date_fin_garantie }}</td>
                                                    <td>{{ $imobilisable->numero_commande }}</td>
                                                    <td>{{ $imobilisable->numero_bille }}</td>
                                                    <td>{{ $imobilisable->emplacement }}</td>
                                                    <td>
                                                   <div class="d-flex align-items-center list-user-action">
                                                       <a class="btn btn-sm btn-icon btn-info" href="{{ route('download-Imobilisable-pdf', $imobilisable->id) }}" data-toggle="tooltip" data-placement="top" title="View">commend</a>
                                                       <a class="btn btn-sm btn-icon btn-warning" href="{{ route('imobilisables.editN_bille', $imobilisable->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">prodact</a>
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
