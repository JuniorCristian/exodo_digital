<div class="price banner" id="loja">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <h2>Conheça nossa loja</h2>
        </div>
        <div class="row listaProdutos">
            @foreach($produtos as $produto)
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="price-item">
                        <div class="price-header">
                            <img src="{{asset('/storage/'.$produto->image)}}" alt="" class="img-produto">
                            <div class="price-title">
                                <h2>{{$produto->title}}</h2>
                            </div>
                            <div class="price-prices">
                                <h2><small>{{$produto->current}}</small>{{number_format($produto->price, '2', ',', '.')}}</h2>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <?= $produto->description;?>
                            </div>
                        </div>
                        <div class="price-footer">
                            <div class="price-action">
                                <a class="btn" href="{{$produto->link}}" target="_blank">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
