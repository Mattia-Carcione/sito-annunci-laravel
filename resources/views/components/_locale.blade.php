<form action="{{route('set_language_locale', $lang)}}" method="POST">

    @csrf

    <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
        <div class="container d-flex">
        <span class="flag-icon flag-icon-{{$nation}}"></span>
        <span class="mx-3 text-dark">{{$text}}</span>
    </div>
    </button>


</form>