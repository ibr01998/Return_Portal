<div class="grid place-items-center h-screen">
    <div class="mb-28 sm:mb-0 m-4">
        <div class="flex justify-center">
            <div class="grid grid-cols-4 gap-8 m-4">
                <div class="h-2 w-10 bg-gray-200 rounded-xl block"></div>
                <div class="h-2 w-10 bg-gray-200 rounded-xl block"></div>
                <div class="h-2 w-10 bg-gray-200 rounded-xl block"></div>
                <div class="h-2 w-10 bg-yellow-400 rounded-xl block"></div>
            </div>
        </div>
        <form method="post" action="<?php echo base_url ('Home/done'); ?>" class="w-full max-w-2xl m-auto shadow-2xl p-8 rounded-lg bg-white">
            <div>
                <a href="/Home/reason" class="absolute border-2 rounded-lg text-2xl p-1 cursor-pointer hover:scale-110"><</a>
            </div>
            <h1 class="m-2 ml-6 sm:ml-0 text-center text-xl sm:text-2xl font-bold"><?= lang('Text.return_type') ?></h1>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <div class="border-2 block mb-6 rounded-lg hover:scale-105 duration-300">
                        <label class="grid grid-cols-10">
                            <div class="m-4 col-span-2 sm:col-span-1">
                                <input type="radio" class="block accent-yellow-300 border-2 w-6 h-6 hover:scale-125 duration-300" name="shipping" value="bpost">
                            </div>
                            <div class="col-span-8 sm:col-span-9">
                                <h1 class="m-3 text-lg block">Bpost</h1>
                            </div>
                        </label>
                    </div>
                    <div class="border-2 block mb-6 rounded-lg hover:scale-105 duration-300">
                        <label class="grid grid-cols-10">
                            <div class="m-4 col-span-2 sm:col-span-1">
                                <input type="radio" class="block accent-yellow-300 border-2 w-6 h-6 hover:scale-125 duration-300" name="shipping" value="bpost">
                            </div>
                            <div class="col-span-8 sm:col-span-9">
                                <h1 class="m-3 text-lg block">PostNL</h1>
                            </div>
                        </label>
                    </div>
                    <div class="border-2 block mb-6 rounded-lg hover:scale-105 duration-300">
                        <label class="grid grid-cols-10">
                            <div class="m-4 col-span-2 sm:col-span-1">
                                <input type="radio" class="block accent-yellow-300 border-2 w-6 h-6 hover:scale-125 duration-300" name="shipping" value="bpost">
                            </div>
                            <div class="col-span-8 sm:col-span-9">
                                <h1 class="m-3 text-lg block">GLS</h1>
                            </div>
                        </label>
                    </div>

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