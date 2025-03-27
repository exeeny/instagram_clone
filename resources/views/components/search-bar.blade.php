<div x-data="searchComponent()">
    <input type="text" placeholder="search" x-model="query" @keyup.debounce.500ms="search" >

    <div x-show="results.length > 0" class="absolute w-full bg-white shadow-md rounded mt-1">
        <ul>
            <template x-for="result in results" :key="result.id" >
                <li class="px-4 py-2 border-b">
                    <a :href="'/profiles/' + result.id"><span x-text="result.username"></span></a>
                    
                </li>
            </template>
        </ul>
    </div>

    <!-- No Results Message -->
    <div x-show="results.length === 0 && query" class="absolute w-full bg-white shadow-md rounded mt-1 px-4 py-2">
        No results found
    </div>
</div>