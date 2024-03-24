<x-app-layout :assets="$assets ?? []">
   <div>
       <div class="row">
           <div class="col-sm-12">
               <div class="card">
                   <div class="card-header d-flex justify-content-between">
                       <div class="header-title">
                           <h4 class="card-title">Securite Consomable </h4>
                       </div>
                       <div class="card-action">
                           <a href="{{ route('consomables.securite') }}" class="btn btn-sm btn-primary" role="button">creer nouvelle</a>
                           <a class="btn btn-sm btn-success" role="button">Exporter vers Excel</a>
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
                                   @if($consomable->suivre_sucrete <= $consomable->quantite) 
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
                                                       <a class="btn btn-sm btn-icon btn-info" href="{{ route('download-Consomable-pdf', $consomable->id) }}" data-toggle="tooltip" data-placement="top" title="View">
                                                           <span class="btn-inner">
                                                           <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.75 2C6.30786 2 2 6.30786 2 11.75C2 17.1921 6.30786 21.5 11.75 21.5C17.1921 21.5 21.5 17.1921 21.5 11.75C21.5 6.30786 17.1921 2 11.75 2ZM11.75 20.125C7.67517 20.125 4.375 16.8248 4.375 12.75C4.375 8.67517 7.67517 5.375 11.75 5.375C15.8248 5.375 19.125 8.67517 19.125 12.75C19.125 16.8248 15.8248 20.125 11.75 20.125Z" fill="currentColor"/>
                                                                <path d="M12.0002 7.3125C11.3882 7.3125 10.8752 7.8255 10.8752 8.4375V15.6255C10.8752 16.2375 11.3882 16.7505 12.0002 16.7505C12.6122 16.7505 13.1252 16.2375 13.1252 15.6255V8.4375C13.1252 7.8255 12.6122 7.3125 12.0002 7.3125Z" fill="currentColor"/>
                                                                <path d="M12 17.0625C11.8251 17.0625 11.654 17.0024 11.5282 16.8766L8.75195 14.1004C8.501 13.8494 8.501 13.4326 8.75195 13.1817C9.0029 12.9307 9.41974 12.9307 9.67069 13.1817L12 15.5015L15.8747 11.6269C16.1256 11.3769 16.5424 11.3769 16.7933 11.6269C17.0443 11.8778 17.0443 12.2946 16.7933 12.5456L12.5203 16.8186C12.3945 16.9443 12.2122 17.0625 12 17.0625Z" fill="currentColor"/>
                                                            </svg>
                                                           </span>
                                                       </a>
                                                       <a class="btn btn-sm btn-icon btn-warning" href="{{ route('consomables.edit', $consomable->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <span class="btn-inner">
                                                                <svg width="20" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path d="M15.1655 4.60254L19.7315 9.16854"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </svg>
                                                            </span>
                                                        </a>
                                                       <form action="{{ route('consomables.destroy', $consomable->id) }}" method="POST">
                                                           @csrf
                                                           @method('DELETE')
                                                           <button type="submit" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                               <span class="btn-inner">
                                                               <button type="submit" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <span class="btn-inner">
                                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                               </span>
                                                           </button>
                                                       </form>
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
