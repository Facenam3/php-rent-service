<?php
    $queryParams = $_GET;
    unset($queryParams['page']);
?>

<?php if ($totalPages > 1): ?>
<nav aria-label="Page navigation example" class="mt-4">
    <ul class="flex items-center -space-x-px h-8 text-sm">
        <li>
            <?php if ($currentPage > 1): ?>
                <a href="?<?= buildQueryString($queryParams, $currentPage - 1) ?>"
                   class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                        <path d="M5 1 1 5l4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            <?php else: ?>
                <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-300 bg-gray-100 border border-e-0 border-gray-200 rounded-s-lg cursor-not-allowed">
                    <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                        <path d="M5 1 1 5l4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            <?php endif; ?>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li>
                <?php if ($i == $currentPage): ?>
                    <span class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">
                        <?= $i ?>
                    </span>
                <?php else: ?>
                    <a href="?<?= buildQueryString($queryParams, $i) ?>"
                       class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                        <?= $i ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>
        <li>
            <?php if ($currentPage < $totalPages): ?>
                <a href="?<?= buildQueryString($queryParams, $currentPage + 1) ?>"
                   class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Next</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                        <path d="m1 9 4-4-4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            <?php else: ?>
                <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-300 bg-gray-100 border border-gray-200 rounded-e-lg cursor-not-allowed">
                    <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                        <path d="m1 9 4-4-4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            <?php endif; ?>
        </li>

    </ul>
</nav>
<?php endif; ?>
