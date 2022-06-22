<?php $validation = \Config\Services::validation(); ?>
<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
<div id="content" class="grid place-items-center h-full sm:h-screen">
    <div class="">
        <form method="post" id="comment_form" action="<?php echo base_url ('Home/Product'); ?>" onsubmit="loading()" enctype="multipart/form-data" class="w-screen max-w-2xl shadow-2xl rounded-lg bg-white">
            <div class="p-6">
                <?php if(isset($logo) && $logo !== null){?>
                    <div class="flex justify-center">
                        <a href="/Home" ><img src="<?= $logo ?>" alt="logo" class=" w-44"></a>
                    </div>
                <?php }else{?>
                    <div class="flex justify-center">
                        <a href="/Home"><h1 class="font-bold m-4 text-3xl bg-black text-white w-52 rounded-lg text-center">Return Portal</h1></a>
                    </div>
                <?php }?>
                <div class="grid grid-cols-4 place-items-center m-4">
                    <div class="h-2 w-12 sm:w-24 bg-[<?= $color ?>] color rounded-lg block"></div>
                    <div class="h-2 w-12 sm:w-24 bg-[<?= $color ?>] color rounded-lg block"></div>
                    <div class="h-2 w-12 sm:w-24 bg-gray-200 rounded-lg block"></div>
                    <div class="h-2 w-12 sm:w-24 bg-gray-200 rounded-lg block"></div>
                </div>
                <h1 class="m-2 text-center text-2xl font-bold"><?= lang("Text.confirmation")?></h1>
                <div class="w-full px-3 mb-6 flex ">
                    <div class="w-1/2 m-4 float-left">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            firstname
                        </label>
                        <div>
                            <?php echo $first = substr($customer['firstname'], 0, 2);
                            $firstlen = strlen($customer['firstname']) - 2;
                            for ($i = 0; $i < $firstlen; $i++ ){ echo '*'; };
                            ?>
                        </div>
                    </div>
                    <div class="w-1/2 m-4 ml-24 float-right">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            lastname
                        </label>
                        <div>
                            <?php echo $last = substr($customer['lastname'], 0, 4);
                            $lastlen = strlen($customer['lastname']) - 4;
                            for ($i = 0; $i < $lastlen; $i++ ){ echo '*'; };
                            ?>
                        </div>
                    </div>
                </div>
                <div class="w-full px-3 mb-6 flex">
                    <div class="m-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            email
                        </label>
                        <div>
                            <?php $first = substr($customer['email'], 0, 3);
                            $last = substr($customer['email'], strpos($customer['email'], "@") + 1);
                            $before = strtok($customer['email'], '@');
                            $len = strlen($before) - 3;

                            echo $first;
                            for ($i = 0; $i < $len; $i++ ){ echo '*'; };
                            echo '@' . $last; ?>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-full px-3">
                        <input id="send_form" data-sitekey="<?= env('RECAPTCHAV3_SITEKEY') ?>" class="appearance-none block w-full bg-white text-black border border-[<?= $color ?>] rounded-lg py-3 px-4 focus:border-[<?= $color ?>] focus:bg-white focus:text-[<?= $color ?>] focus:scale-105 focus:border-green-500 hover:bg-green-500 hover:border-none hover:text-white duration-300 uppercase font-semibold" type="submit" name="confirm" value="<?= lang('Text.yes')?>">
                    </div>
                    <div class="w-full px-3">
                        <input id="send_form" data-sitekey="<?= env('RECAPTCHAV3_SITEKEY') ?>" class="appearance-none block w-full bg-white text-black border border-[<?= $color ?>] rounded-lg py-3 px-4 focus:border-[<?= $color ?>] focus:bg-white focus:text-[<?= $color ?>] focus:scale-105 focus:border-red-500 hover:bg-red-500 hover:border-none hover:text-white duration-300 uppercase font-semibold" type="submit" name="deny" value="<?= lang('Text.no')?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>
    $(window).on("load", function (){
        $(".loader-wrapper").fadeOut("slow");
    });

    function loading(){
        $(".loader-wrapper").fadeIn("slow");

    }

</script>
<style>
    .loader-wrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.2);
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .loader {
        display: inline-block;
        width: 30px;
        height: 30px;
        position: relative;
        border: 4px solid #Fff;
        animation: loader 2s infinite ease;
    }
    .loader-inner {
        vertical-align: top;
        display: inline-block;
        width: 100%;
        background-color: #fff;
        animation: loader-inner 2s infinite ease-in;
    }

    ::-webkit-scrollbar {
        width: 10px;
        height: 20px;
    }

    ::-webkit-scrollbar-track {
        border-radius: 100vh;
        background: #f7f4ed;
    }

    ::-webkit-scrollbar-thumb {
        background: <?= $color ?>;
        border-radius: 100vh;
        border: 3px solid #f6f7ed;
    }

    @keyframes loader {
        0% { transform: rotate(0deg);}
        25% { transform: rotate(180deg);}
        50% { transform: rotate(180deg);}
        75% { transform: rotate(360deg);}
        100% { transform: rotate(360deg);}
    }

    @keyframes loader-inner {
        0% { height: 0%;}
        25% { height: 0%;}
        50% { height: 100%;}
        75% { height: 100%;}
        100% { height: 0%;}
    }
</style>