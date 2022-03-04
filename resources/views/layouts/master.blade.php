<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/cesta.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <title>Document</title>
</head>
<body>
    <div class="container-fluid main">
        <header class="row">
        <nav class="navbar fixed-top navbar-light bg-light bg-opacity-75">
            <div class="container-fluid">
                <div class="dropdown">
                <a class="dropdown text-dark" href="#" role="button" id="dropdownPerfil" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownPerfil">
                    <li class="dropdown-item active">{{Auth::user()->name}}</li>
                    <li><a class="dropdown-item" href="#">Ver perfil</a></li>
                    <li><a class="dropdown-item" href="#">Añadir Producto</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Cerrar Session</a></li>
                </ul>
                </div>
                <a class="nav-link text-dark h4" href="#">Hosteleria Mendizorrotza</a>
                <div>
                    <a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a>
                </div>
            </div>
        </nav>
        </header>
        <div class="shopping-cart">
            <div class="shopping-cart-header">
            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
            <div class="shopping-cart-total">
                <span class="lighter-text">Total:</span>
                <span class="main-color-text">$2,229.97</span>
            </div>
            </div> <!--end shopping-cart-header -->

            <ul class="shopping-cart-items">
            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                <span class="item-name">Sony DSC-RX100M III</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>
            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                <span class="item-name">Sony DSC-RX100M III</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>
            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                <span class="item-name">Sony DSC-RX100M III</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>

            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
                <span class="item-name">KS Automatic Mechanic...</span>
                <span class="item-price">$1,249.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>

            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
                <span class="item-name">Kindle, 6" Glare-Free To...</span>
                <span class="item-price">$129.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>
            </ul>

            <a href="#" class="button">Checkout</a>
        </div> 
        



        <div class="row bg-secondary bg-opacity-25 mt-5">
        
            @yield('contenedor')
        </div>
        <footer class="row">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand text-white py-1">Manual aplicacion</a>
                </div>
                <div>
                    <a class="navbar-brand text-white py-1">Contenido Copyrigth</a>
                </div>
                </div>
            </div>
        </nav>
        </footer>
    </div>
    
</body>
</html>