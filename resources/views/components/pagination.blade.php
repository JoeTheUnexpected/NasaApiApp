@props(['totalPages'])
@if($totalPages > 1)
    <nav aria-label="Page navigation example" id="pagination" class="mt-4 mb-4 flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            <li>
                @if((request()->get('page') ?? 1) == 1)
                    <span class="block cursor-pointer py-2 px-3 ml-0 leading-tight rounded-l-lg border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </span>
                @else
                    <a href="{{ request()->fullUrlWithQuery(['page' => intval(request()->get('page') ?? 1) - 1]) }}" class="block py-2 px-3 ml-0 leading-tight rounded-l-lg border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @endif
            </li>

            @for($i = 1; $i <= $totalPages; $i++)
                @if((request()->get('page') ?? 1) == $i)
                    <li>
                        <span aria-current="page" class="z-10 block cursor-pointer py-2 px-3 leading-tight border border-gray-700 bg-gray-700 text-white">{{ $i }}</span>
                    </li>
                @else
                    <li>
                        <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="block py-2 px-3 leading-tight border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            <li>
                @if((request()->get('page') ?? 1) == $totalPages)
                    <span class="block cursor-pointer py-2 px-3 leading-tight rounded-r-lg border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </span>
                @else
                    <a href="{{ request()->fullUrlWithQuery(['page' => intval(request()->get('page') ?? 1) + 1]) }}" class="block py-2 px-3 leading-tight rounded-r-lg border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @endif
            </li>
        </ul>
    </nav>
@endif