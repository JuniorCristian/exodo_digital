<div class="team" id="cursos">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>Cursos da Êxodo Digital</p>
            <h2>Nossos Cursos</h2>
        </div>
        <div class="row">
            @foreach($cursos as $curso)
                <div class="col-lg-4 wow">
                    <div class="team-item">
                        <div class="team-text">
                            <h2>{{$curso->title}}</h2>
                            <p>
                                {{$curso->description}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
