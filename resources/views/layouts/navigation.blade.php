<nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
          <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 md:text-2xl hover:text-orange-400 ml-4"
            href="/">
            Los Pollos Hermanos
          </a>
          <!-- Mobile menu button -->
          <div @click="isOpen = !isOpen" class="flex md:hidden">
            <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
              aria-label="toggle menu">
              <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                <path fill-rule="evenodd"
                  d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                </path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div :class="isOpen ? 'flex' : 'hidden'"
          class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 hover:text-orange-400"
            href="/">Beranda</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 hover:text-orange-400"
            href="{{ route('menu') }}">Menu</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 hover:text-orange-400"
            href="{{ route('cart') }}">Keranjang</a>
		  <a class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 hover:text-orange-400"
            href="{{ route('orders') }}">Pesanan</a>
		  
		  <!-- Authentication Links -->
		  @guest
		    <a href="{{ route('register') }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Register</a>
		    <a href="{{ route('login') }}" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">Login</a>
	  	  @endguest

		  @auth
		    <form method="POST" action="{{ route('logout') }}">
			  @csrf
			  <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Logout</button>
		    </form>
		  @endauth
		  
        </div>
      </nav>