@extends('frontend.layouts.app')

@section('title', 'Gallery | Perfect Events')

@section('content')
<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="flex items-center justify-between mb-8">
      <div>
        <h1 class="text-4xl font-extrabold text-gray-900">Our Gallery</h1>
        <p class="text-gray-600 mt-2 text-lg">A collection of our finest moments from over 500+ events.</p>
      </div>
      <a href="/" class="text-purple-700 hover:text-purple-900 font-semibold border border-purple-200 px-4 py-2 rounded-full hover:bg-purple-50 transition">
        ← Back to Home
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
      
      <div class="rounded-2xl overflow-hidden shadow-xl bg-white group">
        <div class="grid grid-cols-2 gap-0.5">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=400&auto=format&fit=crop" alt="Wedding Couple">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=400&auto=format&fit=crop" alt="Rings">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=400&auto=format&fit=crop" alt="Decor">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1606800052052-a08af7148866?q=80&w=400&auto=format&fit=crop" alt="Ceremony">
        </div>
        <div class="p-4 text-center">
            <h3 class="font-bold text-gray-800 text-xl">Weddings</h3>
            <p class="text-sm text-gray-500">150+ Albums</p>
        </div>
      </div>

      <div class="rounded-2xl overflow-hidden shadow-xl bg-white group">
        <div class="grid grid-cols-2 gap-0.5">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=400&auto=format&fit=crop" alt="Conference">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=400&auto=format&fit=crop" alt="Meeting">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=400&auto=format&fit=crop" alt="Speaker">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=400&auto=format&fit=crop" alt="Team">
        </div>
        <div class="p-4 text-center">
            <h3 class="font-bold text-gray-800 text-xl">Corporate</h3>
            <p class="text-sm text-gray-500">80+ Events</p>
        </div>
      </div>

      <div class="rounded-2xl overflow-hidden shadow-xl bg-white group">
        <div class="grid grid-cols-2 gap-0.5">
           <img class="w-full h-32 object-cover" src="storage/images/bday.jpg?q=80&w=800&auto=format&fit=crop" alt="Birthday">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=400&auto=format&fit=crop" alt="Concert">
           <img class="w-full h-32 object-cover" src="storage/images/mrg1.jpg?q=80&w=400&auto=format&fit=crop" alt="DJ">
           <img class="w-full h-32 object-cover" src="https://images.unsplash.com/photo-1556679343-c7306c1976bc?q=80&w=400&auto=format&fit=crop" alt="Drinks">
        </div>
        <div class="p-4 text-center">
            <h3 class="font-bold text-gray-800 text-xl">Social</h3>
            <p class="text-sm text-gray-500">200+ Parties</p>
        </div>
      </div>
    </div>

    <div class="border-t border-gray-200 my-12"></div>

    <h2 class="text-3xl font-bold text-gray-900 mb-8">All Event Photos</h2>
    
    <div class="masonry columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">

      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=800&auto=format&fit=crop" alt="Wedding 1">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=800&auto=format&fit=crop" alt="Wedding 2">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1520854221256-17451cc330e7?q=80&w=800&auto=format&fit=crop" alt="Wedding 3">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?q=80&w=800&auto=format&fit=crop" alt="Indian Wedding">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop" alt="Wedding Arch">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1606800052052-a08af7148866?q=80&w=800&auto=format&fit=crop" alt="Couple Holding Hands">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1535295972055-1c762f4483e5?q=80&w=800&auto=format&fit=crop" alt="Wedding Cake">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop" alt="Flower Decor">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1621621667797-e06afc217fb0?q=80&w=800&auto=format&fit=crop" alt="Hindu Wedding">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1519225448526-0a029515417d?q=80&w=800&auto=format&fit=crop" alt="Wedding Venue">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1529636721854-92150a87230d?q=80&w=800&auto=format&fit=crop" alt="Bridesmaids">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1510076857977-d0c68d18d42b?q=80&w=800&auto=format&fit=crop" alt="Dining">
      </div>

      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=800&auto=format&fit=crop" alt="Conference">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1475721027767-65a4c41d2473?q=80&w=800&auto=format&fit=crop" alt="Auditorium">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=800&auto=format&fit=crop" alt="Meeting">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=800&auto=format&fit=crop" alt="Speaker">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?q=80&w=800&auto=format&fit=crop" alt="Seminar">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=800&auto=format&fit=crop" alt="Professional Handshake">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800&auto=format&fit=crop" alt="Teamwork">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop" alt="Office Event">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1559223607-a43c990c3609?q=80&w=800&auto=format&fit=crop" alt="Product Launch">
      </div>

      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1558636508-e0db3814bd1d?q=80&w=800&auto=format&fit=crop" alt="Birthday Cake">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=800&auto=format&fit=crop" alt="Concert Crowd">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1514525253440-b393452e8d26?q=80&w=800&auto=format&fit=crop" alt="DJ">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1556679343-c7306c1976bc?q=80&w=800&auto=format&fit=crop" alt="Cocktails">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1496024840928-4c417adf211d?q=80&w=800&auto=format&fit=crop" alt="Confetti">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1533174072545-e8d4aa97d890?q=80&w=800&auto=format&fit=crop" alt="Party Lights">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=800&auto=format&fit=crop" alt="Catering">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1605296867424-35fc25c9212d?q=80&w=800&auto=format&fit=crop" alt="Toast">
      </div>
      <div class="break-inside-avoid mb-4 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full object-cover hover:scale-105 transition duration-500" loading="lazy" src="https://images.unsplash.com/photo-1464349153735-7db50ed83c84?q=80&w=800&auto=format&fit=crop" alt="Birthday Party">
      </div>

    </div>
  </div>
</section>

<style>
  /* Masonry Fallback and Spacing */
  .masonry > * { 
      break-inside: avoid; 
      margin-bottom: 1.5rem; 
  }
</style>
@endsection