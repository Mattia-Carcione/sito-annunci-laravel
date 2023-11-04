<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <!-- Footer Location-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">{{__('ui.location')}}</h4>
                <ul class="text-center p-0" style="list-style:none">
                    <li><h5>Antonello Rinaldelli</h5></li>
                    <li><h5>Andrea Criscione</h5></li>
                    <li><h5>Marco Cima</h5></li>
                    <li><h5>Mattia Carcione</h5></li>

                </ul>
            </div>
            <!-- Footer Social Icons-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">{{__('ui.aroundTheWeb')}}</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                        class="fab fa-fw fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                        class="fab fa-fw fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                        class="fab fa-fw fa-dribbble"></i></a>
            </div>
            <!-- Footer About Text-->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">{{__('ui.revisor')}}</h4>
                <p class="lead mb-2">
                    {{__('ui.workWithUs')}}<br>
                </p>
                <p>
                    <a class="button btn btn-hover text-dark" style="background-color: #C5DCDC" href="{{ route('become.revisor') }}">
                        {{__('ui.here')}}</a>
                </p>

            </div>
        </div>
    </div>
</footer>
