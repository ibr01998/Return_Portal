<div class="grid place-items-center h-screen">
    <div class="mb-28 sm:mb-0 m-4">
        <div class="w-full max-w-2xl m-auto shadow-2xl rounded-lg bg-white">
            <div class="grid grid-cols-4">
                <div class="h-2 w-full bg-[<?= $color ?>] color rounded-l-lg block"></div>
                <div class="h-2 w-full bg-[<?= $color ?>] color block"></div>
                <div class="h-2 w-full bg-[<?= $color ?>] color block"></div>
                <div class="h-2 w-full bg-[<?= $color ?>] color rounded-r-lg block"></div>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-2">
                    <?php if(isset($logo) && $logo !== null && !empty($logo)){?>
                        <div>
                            <a href="/Home" ><img src="<?= $logo ?>" alt="logo" class="m-4 w-44"></a>
                        </div>
                    <?php }else{?>
                        <div class="flex justify-center">
                            <a href="/Home"><h1 class="font-bold m-4 text-3xl bg-black text-white w-52 rounded-lg text-center">Return Portal</h1></a>
                        </div>
                    <?php }?>
                    <div class="m-auto w-1/3 text-center">
                        <h1 class="text-3xl font-semibold text-[<?= $color ?>]">Preview</h1>
                    </div>
                </div>
                <h1 class="text-2xl text-center font-bold m-2">Your Return Has Been Placed Successfully!</h1>
                <p class="text-center"><?php echo $text ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<style>

</style>