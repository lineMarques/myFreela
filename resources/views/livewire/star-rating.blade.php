<section>
    <div>
        <div class="stars flex flex-row-reverse justify-end">

            <input class="hidden peer" type="radio" id="star1" name="star" value="5">
            <label for="star1" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

            <input class="hidden peer" type="radio" id="star2" name="star" value="4">
            <label for="star2" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

            <input class="hidden peer" type="radio" id="star3" name="star" value="3">
            <label for="star3" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

            <input class="hidden peer" type="radio" id="star4" name="star" value="2">
            <label for="star4" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

            <input class="hidden peer" type="radio" id="star5" name="star" value="1" required>
            <label for="star5" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

        </div>

        <div class="mt-10">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Reviwe') }}
            </h2>
            <textarea
                class="w-full block font-medium text-sm text-gray-700 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                name="reviwe" id="reviwe" cols="30" rows="10"></textarea>
        </div>
    </div>
</section>
