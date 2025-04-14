<button @click="isDarkMode = ! isDarkMode">
<span x-show="isDarkMode" class="text-white">☀</span>
<span x-show="! isDarkMode" class="text-black">🌙</span>
</button>