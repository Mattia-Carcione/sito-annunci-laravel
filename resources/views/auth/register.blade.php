<x-auth>

    <section class="vh-120 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">{{__('ui.registrazione')}}</h2>
                                <p class="text-white-50 mb-5">{{__('ui.registerToYourAccount')}}</p>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-lg" />
                                        <label class="form-label">{{__('ui.name')}}</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" value="{{ old('email') }}" id="typeEmailX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password_confirmation" id="typePasswordX"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">{{__('ui.confirmPassword')}}</label>
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">{{__('ui.forgotPassword')}}</a></p>

                                    <button class=" gradient-custom btn btn-outline-light btn-lg px-5"
                                        type="submit">{{__('ui.register')}}</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i
                                                class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>

                            </div>

                            <div>
                                <p class="mb-0">{{__('ui.dontHaveAnAccount')}} <a href="{{ route('login') }}"
                                        class="text-white-50 fw-bold">Login</a>
                                </p>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-auth>
