<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">History</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Table Name</th>
                                    <th>Data</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    <tr>
                                        <td>{{ $history->id }}</td>
                                        <td>{{ $history->user->username }}</td>
                                        <td>{{ $history->action }}</td>
                                        <td>{{ $history->table_name }}</td>
                                        <td>
                                            @php
                                                $jsonData = json_decode($history->data);
                                            @endphp
                                            
                                            @if (!is_null($jsonData) && isset($jsonData->code_article))
                                                {{ $jsonData->code_article }}
                                            @elseif (!is_null($jsonData) && isset($jsonData->code_matricule))
                                                {{ $jsonData->code_matricule }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $history->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
