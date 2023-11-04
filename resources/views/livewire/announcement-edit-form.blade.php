<div>
    <main class="d-flex flex-column justify-content-center align-items-center mt-5 pt-5">
        <h1 class="py-2 fw-bolder">{{__('ui.editAnnouncement')}}</h1>
        <div class="divider-custom m-0">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <form class="container" wire:submit.prevent="update">
            @csrf

            {{-- Message Success --}}
            @if (session()->has('message'))
                <div class="flex flex-row justify-content-center alert alert-success">
                    {{session('message') }}
                </div>
            @endif

            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="title">{{__('ui.title')}}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title"
                    placeholder="Inserisci il titolo" />
                @error('title')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category select -->
            <div class="form-outline mb-4">
                <label class="form-label" for="category">{{__('ui.category')}}</label>
                <select type="text" class="form-control" wire:model.defer="category">
                    <option value="">--Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            
            {{--Input image  --}}

            <div class="form-outline mb-4">
                <label class="form-label" for="">{{__('ui.images')}}</label>
                <input type="file" name="images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror " wire:model="temporary_images" id="upload{{ $iteration }}" />
                @error('temporary_images.*')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            @if (!empty($images))
           

            <div class="row">
                <div class="col-12">
                    <p>{{__('ui.imagesSelected')}}</p>
                    <div class="row border border-4 border-info rounded  py-4">
                        
                        @foreach ( $images as $key => $image )

                        @foreach ( $image as $key => $item )
                        
                        
                        <div class="col-6 my-1">
                            {{-- <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}})"></div> --}}
                            
                            
                            <img src="{{$item->getUrl()}}" alt="" class="img-responsive p-3" style=" background-position: center; background-size: cover; width: 70%; height: 70%">
                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2" wire:click="removeImage({{$key}})">Cancella</button>
                        </div>
                        
                        @endforeach
                            
                        @endforeach
                    </div>
                </div>                
            </div>
                
            @endif


            <!-- Description textarea -->
            <div class="form-outline mb-4">
                <label class="form-label" for="description">{{__('ui.description')}}</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" wire:model.debounce.1500ms="description"
                    rows="4" placeholder="Inserisci la descrizione">
                </textarea>
                @error('description')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Price input --}}
            <div class="form-outline mb-4">
                <label class="form-label" for="price">{{__('ui.price')}}</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" wire:model="price" />
                @error('price')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>


            <!-- Submit button -->
            <button type="submit" class="button btn btn-hover btn-block mb-4"><i class="fa-solid fa-circle-plus"></i>
                {{__('ui.create')}}</button>
        </form>
    </main>
</div>
