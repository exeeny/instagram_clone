<div x-data="searchComponent()">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="search" x-model="query" @keyup.debounce.300ms="search" >

    <div x-show="results.length > 0" class="absolute dark:bg-gray-700 dark:text-white bg-white shadow-md rounded mt-1">
        <ul>
            <template x-for="result in results" :key="result.id" >
                <li class="px-4 py-2  dark:bg-gray-700 dark:text-white ">
                    <a :href="'/profiles/' + result.id"><span x-text="result.username"></span></a>
                    
                </li>
            </template>
            <a :href="'/searchMore?query=' + encodeURIComponent(query)"  class="px-4 py-2  dark:bg-gray-700 dark:text-white">more results</a>
        </ul>
    </div>


    <div x-show="results.length === 0 && query" class="absolute  bg-white shadow-md rounded mt-1 px-4 py-2 dark:bg-gray-700 dark:text-white">
        No results found
    </div>
</div>