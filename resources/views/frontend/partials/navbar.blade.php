<nav id="site-nav" class="fixed top-0 inset-x-0 z-50 bg-transparent">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between rounded-full mt-3 px-4 md:px-6 transition-all duration-300">
      <a href="/" class="flex items-center gap-2">
        <img src="https://dummyimage.com/40x40/6b46c1/ffffff&text=P" class="h-10 w-10 rounded-full" alt="Logo">
        <span class="font-semibold text-lg">Perfect Events</span>
      </a>

      <div class="hidden md:flex items-center gap-8">
        <a href="#home" class="text-sm font-medium text-gray-700 hover:text-purple-700">Home</a>
        <a href="#about" class="text-sm font-medium text-gray-700 hover:text-purple-700">About</a>
        <a href="#services" class="text-sm font-medium text-gray-700 hover:text-purple-700">Services</a>
        <a href="#venues" class="text-sm font-medium text-gray-700 hover:text-purple-700">Venues</a>
        <a href="#gallery" class="text-sm font-medium text-gray-700 hover:text-purple-700">Gallery</a>
        <a href="#contact" class="text-sm font-medium text-gray-700 hover:text-purple-700">Contact Us</a>
      </div>

      <div class="hidden md:flex items-center gap-3">
        <a href="tel:+918590010011" class="inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm shadow hover:bg-purple-700">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 002.25-2.25v-2.172a1.5 1.5 0 00-1.335-1.492l-3.591-.399a1.5 1.5 0 00-1.234.435l-1.548 1.548a12.03 12.03 0 01-5.303-5.303l1.548-1.548a1.5 1.5 0 00.435-1.234l-.399-3.591A1.5 1.5 0 007.172 3h-2.172A2.25 2.25 0 002.75 5.25v1.5h-.5z"/></svg>
          +91 859-001-0011
        </a>
      </div>

      <button id="mobile-menu-btn" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:bg-gray-100" aria-label="Toggle navigation">
        <svg id="menu-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>

  <div id="mobile-menu" class="md:hidden hidden border-t border-gray-200 bg-white">
    <div class="space-y-1 px-4 py-3">
      <a href="#home" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Home</a>
      <a href="#about" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">About</a>
      <a href="#services" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Services</a>
      <a href="#venues" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Venues</a>
      <a href="#gallery" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Gallery</a>
      <a href="#contact" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Contact Us</a>
      <a href="tel:+918590010011" class="mt-2 inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm shadow hover:bg-purple-700">Call Us</a>
    </div>
  </div>

  <script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const nav = document.getElementById('site-nav');
    const navInner = nav?.querySelector('div > div');
    btn?.addEventListener('click', () => {
      menu?.classList.toggle('hidden');
    });
    const onScroll = () => {
      if (window.scrollY > 10) {
        nav?.classList.add('backdrop-blur');
        nav?.classList.remove('bg-transparent');
        nav?.classList.add('bg-white/80');
        navInner?.classList.add('shadow-md','border','border-gray-200','bg-white/90');
      } else {
        nav?.classList.remove('bg-white/80');
        nav?.classList.add('bg-transparent');
        navInner?.classList.remove('shadow-md','border','border-gray-200','bg-white/90');
      }
    };
    window.addEventListener('scroll', onScroll);
    onScroll();
  </script>
</nav>
