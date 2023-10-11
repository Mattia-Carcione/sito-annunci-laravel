    <main class="d-flex flex-column justify-content-center align-items-center min-vh-100">
        <h1>Aggiungi un annuncio</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>            
        @endif
        <form class="container" wire:submit.prevent="store">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                    wire:model="title" placeholder="Inserisci il titolo" />
                @error('title')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category select -->
            <div class="form-outline mb-4">
                <label class="form-label" for="category">Categoria</label>
                <select type="text"  class="form-control" wire:model.defer="category">
                    <option value="">--Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description textarea -->
            <div class="form-outline mb-4">
                <label class="form-label" for="description">Descrizione dell'articolo</label>
                <textarea type="text"  class="form-control @error('description') is-invalid @enderror"
                    wire:model="description" rows="4" placeholder="Inserisci la descrizione">
                </textarea>
                @error('description')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Price input --}}
            <div class="form-outline mb-4">
                <label class="form-label" for="price">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror"
                    wire:model="price" />
                @error('price')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4"><i class="fa-solid fa-circle-plus"></i>
                Aggiungi</button>
        </form>
    </main>
