<x-layout>
    <main class="d-flex flex-column justify-content-center align-items-center min-vh-100">
        <form class="container" wire:submit.prevent="store">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example1">Titolo</label>
                <input type="text" id="form4Example1" class="form-control" wire:model="title" />
                @error('title')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example2">Descrizione dell'articolo</label>
                <textarea type="text" id="form4Example2" class="form-control" wire:model="description"  rows="4"></textarea>
                @error('description')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
        </form>
    </main>
</x-layout>
