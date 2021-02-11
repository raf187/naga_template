@foreach($iceCream as $ice)
    <div class="card">
        <img src="{{ $ice->url_img }}" class="card-img" alt="Nâga Antibes menu">
        <div class="card-body border-bottom">
            <h5 class="card-title text-success font-weight-bold">{{ $ice->name }}</h5>
            <p class="card-text">{{ $ice->description }}</p>
        </div>
        <div class="mx-auto">
            <a href="/add-to-cart/{{ $ice->id }}" data-dataid="{{ $ice->id }}" class="btnOrder btnAddDI">@include('menu.btnAddToCart')</a>
        </div>
    </div>
@endforeach
