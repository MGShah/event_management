@extends('layouts.app')

@section('title', 'Account | Perfect Events')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-purple-50 to-white py-16">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col items-center mb-10">
      <h1 class="text-3xl font-bold">Welcome</h1>
      <p class="text-gray-600 mt-1">Login or create an account to plan your perfect event.</p>
    </div>

    <div class="relative w-full max-w-4xl mx-auto" x-data="{ side: '{{ request('mode', 'login') }}' }">
      <div id="book" class="relative mx-auto perspective-1000" style="perspective: 1400px;">
        <!-- Book wrapper -->
        <div id="pages" class="relative w-full h-[520px] transition-transform duration-700">
          <!-- Left Page (Signup) -->
          <div class="absolute inset-0 bg-white rounded-xl shadow-xl overflow-hidden transform backface-hidden" :class="side==='signup' ? 'rotate-y-0 z-20' : '-rotate-y-180 z-10'" style="transform-style: preserve-3d;">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-600/10 to-pink-600/10"></div>
            <div class="relative grid md:grid-cols-2 h-full">
              <div class="hidden md:block h-full">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Signup visual">
              </div>
              <div class="p-8 flex items-center">
                <form class="w-full space-y-4">
                  <h2 class="text-2xl font-semibold mb-2">Create Account</h2>
                  <div class="grid grid-cols-2 gap-3">
                    <input class="w-full rounded-md border-gray-300" placeholder="First name" required>
                    <input class="w-full rounded-md border-gray-300" placeholder="Last name" required>
                  </div>
                  <input type="email" class="w-full rounded-md border-gray-300" placeholder="Email" required>
                  <input type="password" class="w-full rounded-md border-gray-300" placeholder="Password" required>
                  <input type="password" class="w-full rounded-md border-gray-300" placeholder="Confirm password" required>
                  <button type="button" class="w-full rounded-md bg-purple-600 text-white py-3 font-semibold hover:bg-purple-700 transition">Sign up</button>
                  <p class="text-sm text-gray-600">Already have an account?
                    <a href="#" @click.prevent="side='login'" class="text-purple-700 font-semibold">Login</a>
                  </p>
                </form>
              </div>
            </div>
          </div>

          <!-- Right Page (Login) -->
          <div class="absolute inset-0 bg-white rounded-xl shadow-xl overflow-hidden transform backface-hidden rotate-y-0" :class="side==='login' ? 'rotate-y-0 z-20' : 'rotate-y-180 z-10'" style="transform-style: preserve-3d;">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-600/10 to-blue-600/10"></div>
            <div class="relative grid md:grid-cols-2 h-full">
              <div class="hidden md:block h-full order-2">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Login visual">
              </div>
              <div class="p-8 flex items-center order-1">
                <form class="w-full space-y-4">
                  <h2 class="text-2xl font-semibold mb-2">Login</h2>
                  <input type="email" class="w-full rounded-md border-gray-300" placeholder="Email" required>
                  <input type="password" class="w-full rounded-md border-gray-300" placeholder="Password" required>
                  <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center gap-2"><input type="checkbox" class="rounded"> Remember me</label>
                    <a href="#" class="text-purple-700 font-semibold">Forgot?</a>
                  </div>
                  <button type="button" class="w-full rounded-md bg-purple-600 text-white py-3 font-semibold hover:bg-purple-700 transition">Login</button>
                  <p class="text-sm text-gray-600">New here?
                    <a href="#" @click.prevent="side='signup'" class="text-purple-700 font-semibold">Create an account</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-center gap-3 mt-6">
        <button @click="side='login'" class="px-4 py-2 rounded-full ring-1 ring-purple-600/30 text-purple-700 hover:bg-purple-50">Login</button>
        <button @click="side='signup'" class="px-4 py-2 rounded-full ring-1 ring-purple-600/30 text-purple-700 hover:bg-purple-50">Sign up</button>
      </div>
    </div>
  </div>
</section>

<!-- Minimal Alpine-like helpers for toggle without external deps -->
<script>
  // super tiny Alpine-like binding for this page only
  (function(){
    const root = document.currentScript.previousElementSibling.querySelector('[x-data]');
    if (!root) return;
    const dataStr = root.getAttribute('x-data');
    const initial = { side: 'login' };
    const mode = new URLSearchParams(location.search).get('mode');
    if (mode) initial.side = mode;
    const state = new Proxy(initial, {
      set(obj, key, val){ obj[key]=val; render(); return true; }
    });
    function render(){
      root.querySelectorAll('[\\:class]').forEach(el=>{
        const expr = el.getAttribute(':class');
        // very limited evaluator
        el.className = el.className.replace(/ rotate-y-180| rotate-y-0| z-20| z-10/g,'');
        const isSignup = state.side==='signup';
        if (expr.includes("side==='signup'")) el.classList.add(isSignup? 'rotate-y-0','z-20':'-rotate-y-180','z-10');
        if (expr.includes("side==='login'")) el.classList.add(state.side==='login'? 'rotate-y-0','z-20':'rotate-y-180','z-10');
      });
    }
    render();
  })();
</script>

<style>
  .rotate-y-0{ transform: rotateY(0deg); }
  .rotate-y-180{ transform: rotateY(180deg); }
  .-rotate-y-180{ transform: rotateY(-180deg); }
  .backface-hidden{ backface-visibility: hidden; }
  .perspective-1000{ perspective: 1000px; }
  #pages{ transform-style: preserve-3d; }
</style>
@endsection
