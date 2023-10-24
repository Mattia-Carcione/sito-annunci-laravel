    <main class="d-flex flex-column justify-content-center align-items-center min-vh-100 mt-5 pt-5">
        <h1 class="py-2">Aggiungi un annuncio</h1>

        <form class="container" wire:submit.prevent="store">
            @csrf

            {{-- Message Success --}}
            @if (session()->has('message'))
                <div class="flex flex-row justify-content-center alert alert-success">
                    {{session('message') }}
                </div>
            @endif

            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title"
                    placeholder="Inserisci il titolo" />
                @error('title')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category select -->
            <div class="form-outline mb-4">
                <label class="form-label" for="category">Categoria</label>
                <select type="text" class="form-control" wire:model.defer="category">
                    <option value="">--Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            
            {{--Input image  --}}

            <div class="form-outline mb-4">
                <label class="form-label" for="">Immagini</label>
                <input type="file" name="images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror " wire:model="temporary_images" />
                @error('temporary_images.*')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            @if (!empty($images))
           

            <div class="row">
                <div class="col-12">
                    <p>photo preview</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach ( $images as $key=>$image )
                        <div class="col-6 my-3">
                            {{-- <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}})"></div> --}}
                            <img src="{{$image->temporaryUrl()}}" alt="">
                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                        </div>
                            
                        @endforeach
                    </div>
                </div>                
            </div>
                
            @endif


            <!-- Description textarea -->
            <div class="form-outline mb-4">
                <label class="form-label" for="description">Descrizione dell'articolo</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" wire:model="description"
                    rows="4" placeholder="Inserisci la descrizione">
                </textarea>
                @error('description')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Price input --}}
            <div class="form-outline mb-4">
                <label class="form-label" for="price">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" wire:model="price" />
                @error('price')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>


            <!-- Submit button -->
            <button type="submit" style="background-color: #C5DCDC" class="btn btn-block mb-4"><i class="fa-solid fa-circle-plus"></i>
                Aggiungi</button>
        </form>
    </main>
