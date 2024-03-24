<x-app-layout :assets="$assets ?? []">
   <div>
       <div class="row">
           <div class="col-sm-12">
               <div class="card">
                   <div class="card-header d-flex justify-content-between">
                       <div class="header-title">
                           <h4 class="card-title">Securite Consomable </h4>
                       </div>
                   </div>
                   <div class="card-body px-0">
                       <div class="table-responsive">
                           <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                               <thead>
                                   <tr class="ligth">
                                       <th>Code article</th>
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
                                   @foreach($consomablessecurite as $consomable)
                                   @if($consomable->suivre_sucrete >= $consomable->quantite) 
                                           <tr>
                                               <td>
                                                   <a href="{{ route('consomables.show', $consomable->id) }}">{{ $consomable->code_article }}</a>
                                               </td>
                                               <td>{{ $consomable->quantite }}</td>
                                               <td>{{ $consomable->suivre_sucrete }}</td>
                                               <td>{{ $consomable->date_reception }}</td>
                                               <td>{{ $consomable->date_fin_garantie }}</td>
                                               <td>{{ $consomable->numero_commande }}</td>
                                               <td>{{ $consomable->numero_bille }}</td>
                                               <td>{{ $consomable->emplacement }}</td>
                                               <td>
                                                   <div class="d-flex align-items-center list-user-action">
                                                       <a class="btn btn-sm btn-icon btn-info" href="{{ route('download-Consomable-pdf', $consomable->id) }}" data-toggle="tooltip" data-placement="top" title="View">commend</a>
                                                       <a class="btn btn-sm btn-icon btn-warning" href="{{ route('consomables.editN_bille', $consomable->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">prodact</a>
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
