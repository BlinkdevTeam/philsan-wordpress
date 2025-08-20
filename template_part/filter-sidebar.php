<!-- BACKDROP -->
<div id="backdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- SIDEBAR -->
<div id="sidebar" 
     class="fixed top-0 right-0 w-80 h-screen bg-white shadow-xl transform translate-x-full transition-transform duration-300 z-50 flex flex-col">
  <div class="flex items-center justify-between p-4 border-b">
    <h2 class="text-xl font-bold">Filters</h2>
    <button id="closeFilter" class="text-gray-500 hover:text-black">&times;</button>
  </div>
  
  <div class="p-4 overflow-y-auto flex-1">
    <p class="mb-4">Example filters go here:</p>
    <label class="block mb-2">
      <input type="checkbox"> Category 1
    </label>
    <label class="block mb-2">
      <input type="checkbox"> Category 2
    </label>
    <label class="block mb-2">
      <input type="checkbox"> Category 3
    </label>
  </div>

  <div class="p-4 border-t">
    <button class="w-full py-2 bg-green-600 text-white rounded">Apply Filters</button>
  </div>
</div>
