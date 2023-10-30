<x-dashboard>
    <div class="container mt-5 ">
        <div class="align-middle gap-2 d-flex justify-content-between">
            <h2>Elenco Annunci Revisionati</h2>
        </div>
            <div class="table-responsive">
                <table class="table border mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Utente</th>
                            <th scope="col" class="hidden">Titolo</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Ultima Modifica</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($announcements as $announcement)
                            
                            <tr>
                                <th scope="row">{{ $announcement->user->name }}</th>
                                <td>{{ $announcement->title }}</td>
                                <td>{{ $announcement->description }}</td>
                                <td>{{ $announcement->category->name }}</td> 
                                <td>{{ $announcement->is_accepted ? 'accettato':'rifiutato' }}</td>
                                <td>{{ $announcement->updated_at }}</td>             

                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    
                                            <a href="{{route('revisor.show', $announcement)}}"
                                                class="btn btn-warning me-md-2">Modifica</a>
                                        
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr colspan="2">Nessun annuncio presente</tr>
                        @endforelse
                        {{ $announcements->links() }}
                    </tbody>
                </table>
            </div>
    </div>
</x-dashboard>