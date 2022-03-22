@extends('layouts.admin')

@section('title', 'Open POS')

@section('css')
    <style>
        /* Boilerplate */
        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        html {
            font-family: sans-serif;
            font-size: 1em;
            line-height: 1.5;
            background-color: #f6f9fc;
            color: #525f7f;
        }

        button {
            font-size: inherit;
            border: none;
            transition: all 0.15s ease-out;
        }

        figure {
            margin: 0;
            overflow: hidden;
        }

        figure img {
            display: block;
            height: inherit;
            width: 100%;
        }

        h2, h3 {
            line-height: 1.3;
        }

        /* Product layout - essential grid classes */
        .pos {
            display: grid;
            align-items: center;
            grid-template-columns: auto minmax(16rem, 20rem);
            overflow: hidden;
        }

        .pos > * {
            align-self: start;
        }

        .pos ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pos-search {
            margin-bottom: 0.75rem;
        }

        .pos-search input {
            width: 100%;
            padding: 0.75rem;
            font-size: inherit;
            border: none;
            border-radius: 0.4rem;
            background-color: #e6ebf1;
            -webkit-appearance: none;
        }

        .pos-search input:focus, .pos-search input:active {
            background-color: #fff;
        }

        .pos-products {
            height: 85vh;
            overflow-y: scroll;
            padding: 0.75rem;
            position: relative;
            -webkit-overflow-scrolling: touch;
        }

        .pos-cart {
            background: #fff;
            display: grid;
            align-items: start;
            grid-template-rows: 6rem auto auto;
            height: 80vh;
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
        }

        .pos-cart header {
            border-bottom: 2px solid #f6f9fc;
            padding: 1.5rem 0.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .pos-cart header > * {
            flex: 1 1 auto;
        }

        .pos-cart header time {
            font-weight: normal;
        }

        .pos-cart header span {
            text-align: right;
        }

        .pos-cart header button {
            padding: 0.375rem 0.75rem;
            background-color: #e6ebf1;
            border-radius: 0.4rem;
            text-align: right;
        }

        .pos-cart header button svg {
            display: block;
            fill: #525f7f;
        }

        .pos-cart header button:active {
            background-color: #525f7f;
        }

        .pos-cart header button:active svg {
            fill: #fff;
        }

        .pos-cart h2, .pos-cart h3 {
            margin: 0;
            font-size: 1.25rem;
            display: inline-block;
        }

        .pos-cart li {
            padding: 0.75rem;
            display: flex;
            align-items: center;
        }

        .pos-cart li > * {
            flex: 0 0 3rem;
        }

        .pos-cart li figure {
            margin-right: 0.75rem;
        }

        .pos-cart li figure img {
            width: 3rem;
        }

        .pos-cart li > span {
            flex: 1;
        }

        .pos-cart li h3 {
            display: block;
            font-size: 1rem;
        }

        .pos-cart button.confirm {
            align-self: end;
            background-color: #00bc81;
            color: #fff;
            font-size: 1.5rem;
            margin: 0 0.75rem 0.75rem 0.75rem;
            border-radius: 0.4rem;
            padding: 1.5rem;
            line-height: 1;
        }

        .pos-cart button.confirm::after {
            content: url('data:image/svg+xml; utf8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="rgb(255,255,255)" d="M0 3.795l2.995-2.98 11.132 11.185-11.132 11.186-2.995-2.981 8.167-8.205-8.167-8.205zm18.04 8.205l-8.167 8.205 2.995 2.98 11.132-11.185-11.132-11.186-2.995 2.98 8.167 8.206z"/></svg>');
            float: right;
            line-height: 1;
            width: 1.5rem;
            opacity: 0.7;
            transform: translateY(1px);
        }

        .pos-cart button.confirm svg {
            float: right;
            fill: #fff;
            opacity: 0.7;
        }


        .pos-cart button.confirm-loading::after{
            content: url('data:image/svg+xml; utf8, <svg xmlns="http://www.w3.org/2000/svg" stroke="rgb(255,255,255)" viewBox="0 0 44 44"><g fill="none" fill-rule="evenodd" stroke-width="2"><circle cx="22" cy="22" r="1"><animate attributeName="r" begin="0s" calcMode="spline" dur="1.8s" keySplines="0.165, 0.84, 0.44, 1" keyTimes="0; 1" repeatCount="indefinite" values="1; 20"/><animate attributeName="stroke-opacity" begin="0s" calcMode="spline" dur="1.8s" keySplines="0.3, 0.61, 0.355, 1" keyTimes="0; 1" repeatCount="indefinite" values="1; 0"/></circle><circle cx="22" cy="22" r="1"><animate attributeName="r" begin="-0.9s" calcMode="spline" dur="1.8s" keySplines="0.165, 0.84, 0.44, 1" keyTimes="0; 1" repeatCount="indefinite" values="1; 20"/><animate attributeName="stroke-opacity" begin="-0.9s" calcMode="spline" dur="1.8s" keySplines="0.3, 0.61, 0.355, 1" keyTimes="0; 1" repeatCount="indefinite" values="1; 0"/></circle></g></svg>');
            opacity: 1;
        }

        .pos-products-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            grid-gap: 0.75rem;
        }

        .pos-products-list > li {
            align-self: start;
        }

        .pos-products-list > li button {
            height: 100%;
            background-color: #e6ebf1;
            border: 0.2rem solid #e6ebf1;
            border-radius: 0.4rem;
            color: #525f7f;
            padding: 0;
        }

        .pos-products-list > li button:hover, .pos-products-list > li button:focus {
            background-color: #fff;
        }

        .pos-products-list > li button:hover svg, .pos-products-list > li button:focus svg {
            fill: #00bc81;
            transform: scale(1.4);
        }

        .pos-products-list > li button:focus {
            outline: none;
            transform: scale(1.05);
        }

        .pos-products-list > li button:active {
            transform: scale(0.95);
        }

        .pos-products-list > li figure {
            background: #fff;
            border-radius: 0.4rem;
            overflow: hidden;
            padding-bottom: 1rem;
        }

        .pos-products-list > li figure img,
        .pos-products-list > li figure svg {
            width: 100%;
            max-width: 450px;
            height: auto;
            object-fit: cover;
        }

        .pos-products-list > li h3 {
            margin: 0;
            margin: 0.5rem;
            font-size: 1.25rem;
        }

        .pos-products-list > li div {
            padding: 0.5rem;
            text-align: left;
            line-height: 2rem;
            font-weight: bold;
        }

        .pos-products-list > li svg {
            float: right;
            fill: #525f7f;
            margin-top: 0.25rem;
            transition: all 0.15s ease-out;
        }

        #pos-cart-items{
            height: 50vh;
            overflow: scroll;
        }
    </style>
@endsection

@section('content-header', 'Create Order')
@section('content-actions')
    <a href="{{route('orders.index')}}" class="btn btn-primary">All Orders</a>
@endsection

@section('content')
    {{--    <div id="cart"></div>--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <main class="pos">
                    <section class="pos-products">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5>
                                Current Order
                            </h5>
                            <time id="time">{{now()->format('M d, Y H:i a')}}</time>
                        </div>
                        <div class="pos-search">
                            <input type="search" oninput="search(event)" name="q" placeholder="Search items...">
                        </div>
                        <ul class="pos-products-list">
                            @forelse($products as $product)
                                <li class="single-item" style="position: relative">
                                    @if(!$product->status || $product->quantity <= 0)
                                        <div class="d-flex align-items-center justify-content-center" style="
                                                cursor: not-allowed;
                                                color: white;
                                                text-shadow: 0 0 15px yellow;
                                                font-weight: bolder;
                                                height: 100%;
                                                width: 100%;
                                                border-radius: 5px;
                                                background: rgba(0,0,0,0.8);
                                                position: absolute;
                                                bottom: 0;
                                                top:0;
                                            ">
                                            @if(!$product->status)
                                                <h1>Inactive</h1>
                                            @endif
                                            @if($product->quantity <= 0)
                                                <h3>Out Of Stock</h3>
                                            @endif
                                        </div>
                                    @endif
                                    <button onclick="addToCart(this)" data-id="{{$product->id}}">
                                        <figure>
                                            <img src="{{Storage::url($product->image)}}" alt="Product Image">
                                            <h3 class="item-name text-truncate" title="{{$product->name}}">{{\Illuminate\Support\Str::words($product->name,3)}}</h3>
                                            <small class="item-description text-truncate w-100" title="{{$product->description}}">{{\Illuminate\Support\Str::words($product->description,2)}}</small>
                                        </figure>
                                        <div class="pos-product-price">
                                            {{config('settings.currency_symbol')}}
                                            <span class="item-price">{{$product->price}}</span>
                                            <svg width="24" height="24" viewBox="0 0 24 24">
                                                <title>Add</title>
                                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/>
                                            </svg>
                                        </div>
                                    </button>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </section>
                    <section class="pos-cart flex">
                        <header>
                            <h1>
                                Cart
                            </h1>
                            <span>
                            <button>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M6 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3zm9 0c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3zm9 0c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z"/>
                                </svg>
                            </button>
                        </span>
                        </header>
                        <ul id="pos-cart-items">
                            <!-- Add Dynamically -->
                        </ul>

                        <button class="confirm" onclick="saveOrder()">
                            {{config('settings.currency_symbol')}}
                            <span id="total-bill">0.00</span>
                        </button>
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        console.clear();
        let currencySymbol = @json(config('settings.currency_symbol'));
        let total_bill;
        let cart;

        resetCart();

        $('body').addClass('sidebar-collapse');

        function cartItemTemplate(id, image, name, price){
            console.log("Createing Cart Item Template...");
            return `
            <li id="single-cart-item-${id}" class="flex single-cart-item">
                <figure>
                    <img src="${image}" alt="">
                </figure>
                <span>
                    <h3 class="single-cart-item-name">${name}</h3>
                    <b>
                        ${currencySymbol} <span class="single-cart-item-price">${price}</span>
                    </b>
                    <small>x</small>
                    <small class="single-cart-item-qty">1</small>
                </span>
                <svg onclick="removeFromCart('single-cart-item-${id}', ${price})" style="cursor: pointer" width="24" height="24" viewBox="0 0 24 24">
                    <title>Add</title>
                    <path style="transform: rotate(45deg) translate(3px, -10px)" fill="red" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/>
                </svg>
            </li>
        `;
        }

        function addToCart(ele){
            console.log("Add Item To Cart...");
            let id = $(ele).data('id');
            let img = $(ele).find('img').attr('src');
            let name = $(ele).find('.item-name').text().trim();
            // let description = $(ele).find('.item-description').text().trim();
            let price = $(ele).find('.item-price').text().trim();

            let item = $(`#single-cart-item-${id}`);
            if(item.length > 0){
                let qty_lbl = $(item).find('.single-cart-item-qty');
                let qty = parseInt($(qty_lbl).text()) + 1;
                $(qty_lbl).text(qty);

                let c_item = cart.find(e=>e.id == id);
                c_item.qty = qty;
            }else{
                $('#pos-cart-items').prepend(cartItemTemplate(id,img,name,price));
                cart.push({
                    id: id,
                    price: price,
                    qty: 1
                });
            }
            total_bill = ((parseFloat(total_bill) + parseFloat(price)).toFixed(2)).toString();
            calculateTotal();
        }

        function removeFromCart(cartItemId, cartItemPrice){
            let qty_lbl = $(`#${cartItemId}`).find('.single-cart-item-qty');
            let qty = parseInt($(qty_lbl).text());
            if(qty > 1){
                qty -= 1;
                $(qty_lbl).text(qty);
            }else{
                $(`#${cartItemId}`).remove();
            }

            total_bill = ((parseFloat(total_bill) - parseFloat(cartItemPrice)).toFixed(2)).toString();
            calculateTotal();
        }

        function calculateTotal(){
            $('#total-bill').text(total_bill);
        }

        function search(event){
            let searchQuery = (event.target.value).toLowerCase();
            let allItems = $('.single-item');

            $('.single-item').removeClass('d-none');

            $.each(allItems, (i,item)=>{
                let text = $(item).text().replace(/\s+|\n|\r/g, " ").toLowerCase();
                if(text.includes(searchQuery)){
                    $(item).removeClass('d-none');
                }else{
                    $(item).addClass('d-none');
                }
            })
        }

        function resetCart(){
            $('#pos-cart-items').empty();
            total_bill = '0.00';
            cart = [];
            calculateTotal()
        }

        function saveOrder(){
            if(cart.length > 0){
                let url = @json(route('orders.store'));

                $('.confirm').addClass('confirm-loading');

                setTimeout(()=>{
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': @json(csrf_token())
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: url,
                        data: { items: cart.map(e => e.id), quantities: cart.map(e => e.qty), prices: cart.map(e => e.price) },
                        success: (res) => {
                            if(res.status === true){
                                alert(res.message);
                            }

                            $('.confirm').removeClass('confirm-loading');
                            resetCart();
                        },
                        fail: (err)=>{
                            console.log(err);
                            $('.confirm').removeClass('confirm-loading');
                            resetCart();
                        }
                    });
                },1000);
            }
        }
    </script>
@endsection
