
<div class="grid place-items-center h-full sm:h-screen">
    <div class="mb-28 sm:mb-0 m-4">
        <div class="flex justify-center">
            <div class="grid grid-cols-4 gap-8 m-4">
                <div class="h-2 w-10 bg-gray-200 rounded-xl block"></div>
                <div class="h-2 w-10 bg-gray-200 rounded-xl block"></div>
                <div class="h-2 w-10 bg-yellow-400 rounded-xl block"></div>
                <div class="h-2 w-10 bg-gray-200 rounded-xl block"></div>
            </div>
        </div>
        <form method="post" action="<?php echo base_url ('Home/return_method'); ?>" class="w-full max-w-2xl m-auto shadow-2xl p-8 rounded-lg bg-white">
            <div>
                <a href="/Home/product" class="absolute border-2 rounded-lg text-2xl p-1 cursor-pointer hover:scale-110"><</a>
            </div>
            <h1 class="m-2 ml-6 sm:ml-0 text-center text-lg sm:text-2xl font-bold"><?= lang('Text.reason') ?></h1>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3 mb-6">
                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        (optional)
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-md text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="reason">
                            <option>...</option>
                            <option>Looks different from image on site</option>
                            <option>Arrived too late</option>
                            <option>Poor quality/Faulty</option>
                            <option>Doesn't suit me</option>
                            <option>Incorrect item received</option>
                            <option>Parcel damaged on arrival</option>
                            <option>Others (Please specify in additional notes)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        (optional)
                    </label>
                    <textarea name="description" id="" cols="30" rows="4" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 resize-none"></textarea>
                </div>
                <div class="w-full px-3">
                    <input class="appearance-none block w-full bg-white text-yellow-400 border border-yellow-400 rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:text-black focus:scale-105 hover:bg-black hover:border-black hover:text-white duration-300" type="submit">
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>