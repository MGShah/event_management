@extends('frontend.layouts.app')

@section('title', 'Home | Perfect Events')

@section('content')
  <section id="home" class="relative min-h-screen">
    <div class="absolute inset-0">
      <img id="hero-img" src="storage/images/hero.jpeg" alt="Wedding celebration" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/50"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen flex flex-col justify-center py-32 sm:py-40">
      <p class="text-purple-200 uppercase tracking-widest font-semibold">India's #1 Exclusive Event Company</p>
      <h1 class="mt-4 text-white text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight max-w-3xl">Partner with Perfect Events</h1>
      <div class="mt-8 flex flex-wrap items-center gap-2">
        <a href="#contact" class="inline-flex items-center justify-center rounded-full bg-purple-600 px-6 py-3 text-white font-semibold shadow-lg hover:bg-purple-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5">Contact Us</a>
        <div class="flex items-center gap-3 bg-white/90 backdrop-blur rounded-full px-4 py-2">
          <div class="flex -space-x-3">
            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/32?img=12" alt="client1">
            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/32?img=22" alt="client2">
            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/32?img=32" alt="client3">
          </div>
          <div class="text-sm">
            <div class="text-yellow-500">★★★★★</div>
            <div class="text-gray-700">4.8/5 Rating</div>
          </div>
        </div>
      </div>
    </div>
    <a href="#about" class="absolute bottom-6 left-1/2 -translate-x-1/2 inline-flex items-center justify-center w-12 h-12 rounded-full ring-1 ring-white/40 text-white hover:bg-white/20 transition-colors duration-300 animate-bounce" aria-label="Scroll down">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
      </svg>
    </a>
  </section>


  <section id="stats" class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
          <div class="text-4xl md:text-5xl font-extrabold"><span class="stat" data-target="15" data-decimals="0" data-suffix="+">0</span></div>
          <div class="mt-2 text-gray-600">Years of Experience</div>
        </div>
        <div>
          <div class="text-4xl md:text-5xl font-extrabold"><span class="stat" data-target="1.7" data-decimals="1" data-suffix="K+">0</span></div>
          <div class="mt-2 text-gray-600">Events Covered</div>
        </div>
        <div>
          <div class="text-4xl md:text-5xl font-extrabold"><span class="stat" data-target="1.5" data-decimals="1" data-suffix="K+">0</span></div>
          <div class="mt-2 text-gray-600">Satisfied Clients</div>
        </div>
        <div>
          <div class="text-4xl md:text-5xl font-extrabold"><span class="stat" data-target="4.8" data-decimals="1" data-suffix="">0</span></div>
          <div class="mt-2 text-gray-600">Customer Rating</div>
        </div>
      </div>
    </div>
  </section>

  <script>
    (function(){
      const els = document.querySelectorAll('#stats .stat');
      if (!('IntersectionObserver' in window) || els.length===0) return;
      const animate = (el) => {
        const target = parseFloat(el.dataset.target || '0');
        const decimals = parseInt(el.dataset.decimals || '0', 10);
        const suffix = el.dataset.suffix || '';
        const duration = 1500; // ms
        const start = performance.now();
        const from = 0;
        const step = (now) => {
          const p = Math.min((now - start) / duration, 1);
          const eased = p<0.5 ? 2*p*p : -1 + (4 - 2*p)*p; // easeInOutQuad
          const val = from + (target - from) * eased;
          el.textContent = val.toFixed(decimals) + suffix;
          if (p < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
      };
      const io = new IntersectionObserver((entries, obs) => {
        entries.forEach(ent => {
          if (ent.isIntersecting) {
            animate(ent.target);
            obs.unobserve(ent.target);
          }
        });
      }, { threshold: 0.4 });
      els.forEach(el => io.observe(el));
    })();
  </script>

  <br><br>
  <section id="about" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-3xl font-bold mb-4">About Us</h2>
        <p class="text-gray-600">At Perfect Events, we are passionate event makers with years of hands-on experience in creating unforgettable moments. From elegant weddings and joyful birthdays to grand corporate events and vibrant engagements, we specialize in turning every occasion into a seamless, stunning celebration. Our dedicated team combines creativity, precision, and professionalism to deliver events that reflect your vision and exceed expectations. With meticulous planning, innovative designs, and flawless execution, we ensure that every detail speaks perfection — because for us, your event is not just another day, it’s a memory that lasts forever.</p>
      </div>
      <img class="w-full h-64 md:h-80 lg:h-96 object-cover rounded-xl shadow-lg" src="storage/images/aboutjpg.jpg" alt="About image"/>
    </div>
    <script>
      (function(){
        const img = document.getElementById('hero-img');
        if(!img) return;
        let running = false;
        const run = () => {
          if (running) return; running = true;
          img.classList.add('hero-zoom-anim');
        };
        img.addEventListener('mouseenter', run);
        img.addEventListener('touchstart', run, {passive:true});
        img.addEventListener('animationend', () => { img.classList.remove('hero-zoom-anim'); running = false; });
        // auto-run once on load
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
          setTimeout(run, 200);
        } else {
          document.addEventListener('DOMContentLoaded', () => setTimeout(run, 200));
        }
      })();
    </script>
    <style>
      .hero-zoom-anim { animation: heroZoom 4s ease-in-out both; }
      @keyframes heroZoom {
        0% { transform: scale(1); }
        50% { transform: scale(1.08); }
        100% { transform: scale(1); }
      }
    </style>
  </section>

  <section id="destination" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-8">
      <div class="grid grid-cols-2 gap-4 order-2 lg:order-1">
        <img class="w-full h-40 md:h-48 object-cover rounded-xl shadow transition-transform duration-300 hover:scale-105" src="storage/images/bday.jpg" alt="dw1"/>
        <img class="w-full h-40 md:h-48 object-cover rounded-xl shadow transition-transform duration-300 hover:scale-105" src="storage/images/mrg.jpg" alt="dw2"/>
        <img class="w-full h-40 md:h-48 object-cover rounded-xl shadow transition-transform duration-300 hover:scale-105" src="storage/images/party.jpg" alt="dw3"/>
        <img class="w-full h-40 md:h-48 object-cover rounded-xl shadow transition-transform duration-300 hover:scale-105" src="storage/images/mrg1.jpg" alt="dw4"/>
      </div>
      <div class="order-1 lg:order-2">
        <div class="bg-gray-900 text-gray-200 rounded-2xl p-8 shadow-xl">
          <h3 class="text-xl md:text-2xl font-semibold text-white">Unlock your dream destination wedding in Kerala</h3>
          <p class="mt-4 text-gray-300 text-sm md:text-base leading-relaxed">Choose Perfect Events for your premium destination wedding in Kerala. Beach vows, backwater resorts or heritage palaces—we bring your story to life with rich traditions, curated venues and seamless planning. Our team assists with venue discovery and booking for an effortless journey.</p>
          <div class="mt-6 flex flex-wrap gap-3">
            <a href="#contact" class="inline-flex items-center gap-2 rounded-full bg-purple-600 px-5 py-2.5 text-white text-sm font-semibold shadow hover:bg-purple-700">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M12 3a9 9 0 100 18 9 9 0 000-18zm.75 5.25a.75.75 0 10-1.5 0v4.5c0 .414.336.75.75.75h3a.75.75 0 100-1.5h-2.25V8.25z"/></svg>
              Talk to Expert
            </a>
            <a href="https://wa.me/918590010011" target="_blank" class="inline-flex items-center gap-2 rounded-full bg-green-600 px-5 py-2.5 text-white text-sm font-semibold shadow hover:bg-green-700">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M.5 12C.5 5.649 5.649.5 12 .5S23.5 5.649 23.5 12 18.351 23.5 12 23.5c-1.91 0-3.71-.455-5.303-1.26L.5 23.5l1.26-6.197A11.45 11.45 0 01.5 12zm6.79-.26c.044.757.414 1.494 1.076 2.235.638.714 1.767 1.56 3.53 2.118 1.786.565 2.84.617 3.588.517.82-.109 1.73-.687 1.976-1.348.24-.648.24-1.222.155-1.383-.08-.153-.277-.24-.58-.366-.293-.121-1.731-.854-2.002-.953-.27-.098-.468-.148-.66.153-.192.302-.758.953-.93 1.146-.172.192-.34.21-.633.09-.293-.121-1.235-.452-2.354-1.375-.869-.693-1.455-1.549-1.627-1.85-.172-.302-.018-.465.103-.586.106-.106.24-.275.358-.413.12-.137.155-.24.233-.402.08-.16.04-.302-.02-.422-.06-.121-.54-1.299-.746-1.774-.196-.47-.394-.403-.54-.41l-.46-.008c-.16 0-.422.06-.644.302-.223.24-.854.835-.854 2.037z"/></svg>
              Whatsapp us
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-end justify-between gap-4 mb-10">
        <h2 class="text-3xl font-bold">Our Services</h2>
        <a href="#contact" class="hidden sm:inline-flex items-center gap-2 text-purple-700 hover:text-purple-900 font-semibold transition-colors">Get a quote →</a>
      </div>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="group relative rounded-2xl overflow-hidden shadow-lg bg-black perspective tilt" data-tilt>
          <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1200&auto=format&fit=crop" alt="Wedding Planning" class="w-full h-72 object-cover opacity-90 transition-transform duration-500 group-hover:scale-105"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-6 text-white">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 ring-1 ring-white/30 text-xs mb-3">Premium</div>
            <h3 class="text-xl font-semibold">Wedding Planning</h3>
            <p class="text-white/80 text-sm mt-1">End‑to‑end planning, design, vendor management and day‑of coordination.</p>
            <button class="mt-4 inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm font-semibold shadow transition-all duration-300 group-hover:-translate-y-0.5 group-hover:shadow-xl">Explore
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M13.5 4.5l6 6-6 6m6-6h-15"/></svg>
            </button>
          </div>
        </div>

        <div class="group relative rounded-2xl overflow-hidden shadow-lg bg-black perspective tilt" data-tilt>
          <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1200&auto=format&fit=crop" alt="Corporate Events" class="w-full h-72 object-cover opacity-90 transition-transform duration-500 group-hover:scale-105"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-6 text-white">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 ring-1 ring-white/30 text-xs mb-3">Business</div>
            <h3 class="text-xl font-semibold">Corporate Events</h3>
            <p class="text-white/80 text-sm mt-1">Product launches, conferences and offsites executed flawlessly.</p>
            <button class="mt-4 inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm font-semibold shadow transition-all duration-300 group-hover:-translate-y-0.5 group-hover:shadow-xl">Explore
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M13.5 4.5l6 6-6 6m6-6h-15"/></svg>
            </button>
          </div>
        </div>

        <div class="group relative rounded-2xl overflow-hidden shadow-lg bg-black perspective tilt" data-tilt>
          <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200&auto=format&fit=crop" alt="Decor & Production" class="w-full h-72 object-cover opacity-90 transition-transform duration-500 group-hover:scale-105"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-6 text-white">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 ring-1 ring-white/30 text-xs mb-3">Creative</div>
            <h3 class="text-xl font-semibold">Decor & Production</h3>
            <p class="text-white/80 text-sm mt-1">Stage, lighting, florals and immersive experiential design.</p>
            <button class="mt-4 inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm font-semibold shadow transition-all duration-300 group-hover:-translate-y-0.5 group-hover:shadow-xl">Explore
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M13.5 4.5l6 6-6 6m6-6h-15"/></svg>
            </button>
          </div>
        </div>
      </div>

      <script>
        // Lightweight 3D tilt effect for elements with class 'tilt'
        const tiltCards = document.querySelectorAll('.tilt');
        tiltCards.forEach(card => {
          let rect;
          const intensity = 10; // degrees
          const update = (e) => {
            rect = rect || card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const rx = ((y / rect.height) - 0.5) * -2 * intensity;
            const ry = ((x / rect.width) - 0.5) * 2 * intensity;
            card.style.transform = perspective(800px) rotateX(${rx}deg) rotateY(${ry}deg);
          };
          const reset = () => { card.style.transform = 'perspective(800px) rotateX(0deg) rotateY(0deg)'; rect = null; };
          card.addEventListener('mousemove', update);
          card.addEventListener('mouseleave', reset);
          card.addEventListener('touchmove', (e)=>{ if(e.touches[0]) update(e.touches[0]); }, {passive:true});
          card.addEventListener('touchend', reset);
        });
      </script>
    </div>
  </section>

  <section id="featured-events" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-end justify-between gap-4 mb-10">
        <h2 class="text-3xl font-bold">Featured Events</h2>
        <a href="{{ route('gallery') }}" class="hidden sm:inline-flex items-center gap-2 text-purple-700 hover:text-purple-900 font-semibold transition-colors">Explore gallery →</a>
      </div>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Wedding -->
        <div class="group relative rounded-2xl overflow-hidden shadow-lg bg-black perspective tilt">
          <img src="storage/images/mrg.jpg" alt="Wedding" class="w-full h-72 object-cover opacity-90 transition-transform duration-500 group-hover:scale-105"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-6 text-white">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 ring-1 ring-white/30 text-xs mb-3">Signature</div>
            <h3 class="text-xl font-semibold">Weddings</h3>
            <p class="text-white/80 text-sm mt-1">Full‑service planning, design and coordination for timeless wedding experiences.</p>
            <a href="{{ route('gallery') }}" class="mt-4 inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm font-semibold shadow transition-all duration-300 group-hover:-translate-y-0.5 group-hover:shadow-xl">View moments
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M13.5 4.5l6 6-6 6m6-6h-15"/></svg>
            </a>
          </div>
        </div>
        <!-- Engagement -->
        <div class="group relative rounded-2xl overflow-hidden shadow-lg bg-black perspective tilt">
          <img src="storage/images/mrg1.jpg" alt="Engagement" class="w-full h-72 object-cover opacity-90 transition-transform duration-500 group-hover:scale-105"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-6 text-white">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 ring-1 ring-white/30 text-xs mb-3">Intimate</div>
            <h3 class="text-xl font-semibold">Engagements</h3>
            <p class="text-white/80 text-sm mt-1">Romantic, personalized celebrations with elegant décor and seamless hosting.</p>
            <a href="{{ route('gallery') }}" class="mt-4 inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm font-semibold shadow transition-all duration-300 group-hover:-translate-y-0.5 group-hover:shadow-xl">View moments
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M13.5 4.5l6 6-6 6m6-6h-15"/></svg>
            </a>
          </div>
        </div>
        <!-- Corporate -->
        <div class="group relative rounded-2xl overflow-hidden shadow-lg bg-black perspective tilt">
          <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1200&auto=format&fit=crop" alt="Corporate" class="w-full h-72 object-cover opacity-90 transition-transform duration-500 group-hover:scale-105"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-6 text-white">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 ring-1 ring-white/30 text-xs mb-3">Business</div>
            <h3 class="text-xl font-semibold">Corporate Events</h3>
            <p class="text-white/80 text-sm mt-1">Conferences, launches and galas that reflect your brand with flawless execution.</p>
            <a href="{{ route('gallery') }}" class="mt-4 inline-flex items-center gap-2 rounded-full bg-purple-600 px-4 py-2 text-white text-sm font-semibold shadow transition-all duration-300 group-hover:-translate-y-0.5 group-hover:shadow-xl">View moments
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M13.5 4.5l6 6-6 6m6-6h-15"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="contact" class="py-20 bg-gradient-to-b from-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-end justify-between mb-10">
        <h2 class="text-3xl font-bold">Contact Us</h2>
        <span class="hidden sm:inline text-sm text-gray-600">Get a custom quote in 24 hours</span>
      </div>
      <div class="grid lg:grid-cols-2 gap-8 items-stretch">
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-600 to-indigo-600 text-white p-8 shadow-xl">
          <div class="relative z-10">
            <p class="text-purple-100">We’d love to craft your perfect event</p>
            <h3 class="mt-2 text-2xl font-semibold">Speak with our planning expert</h3>
            <div class="mt-6 space-y-4 text-purple-100">
              <div class="flex items-center gap-3"><span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15">📞</span><a href="tel:+918590010011" class="hover:text-white">+91 859-001-0011</a></div>
              <div class="flex items-center gap-3"><span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15">✉</span><a href="mailto:hello@perfectevents.com" class="hover:text-white">hello@perfectevents.com</a></div>
              <div class="flex items-center gap-3"><span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15">📍</span><span>Kerala, India</span></div>
            </div>
            <div class="mt-8 flex flex-wrap gap-3">
              <a href="https://wa.me/918590010011" target="_blank" class="inline-flex items-center gap-2 rounded-full bg-green-500 px-5 py-2.5 text-white text-sm font-semibold shadow hover:bg-green-600">WhatsApp</a>
              <a href="tel:+918590010011" class="inline-flex items-center gap-2 rounded-full bg-white/10 px-5 py-2.5 text-white text-sm font-semibold ring-1 ring-white/30 hover:bg-white/20">Call Now</a>
            </div>
          </div>
          <div class="absolute -right-16 -bottom-16 h-56 w-56 rounded-full bg-white/10 blur-2xl"></div>
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
          <form class="grid gap-5">
            <div class="grid md:grid-cols-2 gap-4">
              <input class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" placeholder="Your Name"/>
              <input class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" placeholder="Phone"/>
            </div>
            <div class="grid md:grid-cols-2 gap-4">
              <input type="email" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" placeholder="Email"/>
              <select class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                <option>Event Type</option>
                <option>Wedding</option>
                <option>Engagement</option>
                <option>Birthday</option>
                <option>Corporate</option>
                <option>Other</option>
              </select>
            </div>
            <div class="grid md:grid-cols-2 gap-4">
              <input type="date" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"/>
              <input type="number" min="1" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" placeholder="Guests"/>
            </div>
            <textarea class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" rows="5" placeholder="Tell us about your vision, venue ideas, budget range..."></textarea>
            <button type="button" class="inline-flex justify-center rounded-xl bg-purple-600 px-6 py-3 text-white font-semibold shadow hover:bg-purple-700 w-full md:w-auto">Send Inquiry</button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection