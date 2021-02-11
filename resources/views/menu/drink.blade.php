@foreach($drinks as $drink)
    <div class="card">
        <img src="{{ $drink->url_img }}" class="card-img" alt="Nâga Antibes menu">
        <div class="card-body border-bottom">
            <h5 class="card-title text-success font-weight-bold">{{ $drink->name }}</h5>
            <p class="card-text">{{ $drink->description }}</p>
        </div>
        <div class="mx-auto">
            <a href="/add-to-cart/{{ $drink->id }}" data-dataid="{{ $drink->id }}" class="btnAddDI">@include('menu.btnAddToCart')</a>
        </div>
    </div>
@endforeach
