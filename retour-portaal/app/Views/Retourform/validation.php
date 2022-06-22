

<?php $validation = \Config\Services::validation(); ?>
<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
<div id="content" class="grid place-items-center h-full sm:h-screen">
    <div class="m-4">
        <form method="post" id="comment_form" action="<?php echo base_url ('Home/validation'); ?>" onsubmit="loading()" enctype="multipart/form-data" class="w-full max-w-2xl m-auto shadow-2xl rounded-lg bg-white">
            <div class="p-6">
            <?php if(isset($logo) && $logo !== null){?>
                <div>
                    <a href="/Home" ><img src="<?= $logo ?>" alt="logo" class="m-4 w-44"></a>
                </div>
            <?php }else{?>
                <div class="flex justify-center">
                    <a href="/Home"><h1 class="font-bold mb-4 text-3xl bg-black text-white w-52 rounded-lg text-center">Return Portal</h1></a>
                </div>
            <?php }?>
                <div class="grid grid-cols-4 place-items-center">
                    <div class="h-2 w-12 sm:w-24 bg-gray-700 rounded-lg block"></div>
                    <div class="h-2 w-12 sm:w-24 bg-gray-200 rounded-lg block"></div>
                    <div class="h-2 w-12 sm:w-24 bg-gray-200 rounded-lg block"></div>
                    <div class="h-2 w-12 sm:w-24 bg-gray-200 rounded-lg block"></div>
                </div>
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha">
                <h1 class="m-2 text-center text-2xl font-bold"><?= lang("Text.validation")?></h1>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3 mb-6 form-group">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            <?= lang('Text.ordernr')?>
                        </label>
                        <input id="ordernr" class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:scale-105 duration-300" type="text" placeholder="1234567" name="ordernr">
                        <?php if($validation->getError('ordernr')) {?>
                            <div class='text-red-500 text-md italic'>
                                <?= $error = $validation->getError('ordernr'); ?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="w-full px-3 mb-6 form-group">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            <?= lang('Text.zipcode')?>
                        </label>
                        <input id="postcode" class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:scale-105 duration-300" type="text" placeholder="2800" name="postcode">
                        <?php if($validation->getError('postcode')) {?>
                            <div class='text-red-500 text-md italic'>
                                <?= $error = $validation->getError('postcode'); ?>
                            </div>
                        <?php }?>
                        <?php if(isset($error)) {?>
                            <div class='text-red-500 text-md italic'>
                                <?php if($error == "mismatch"){ echo lang('Text.mismatch'); }?>
                                <?php if($error == "ordernr_error"){ echo lang('Text.ordernr_error'); }?>
                                <?php if($error == "late_error"){ echo lang('Text.late_error'); }?>
                                <?php if($error == "shipping_error"){ echo lang('Text.shipping_error'); }?>
                                <?php if($error == "disabled"){ echo lang('Text.disabled'); }?>
                                <?php if($error == "reCaptcha"){ echo lang('Text.reCaptcha'); }?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="w-full px-3">
                        <input id="send_form" data-sitekey="<?= env('RECAPTCHAV3_SITEKEY') ?>" class="appearance-none block w-full bg-white text-black border border-black rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:text-black focus:scale-105 hover:bg-black hover:border-black hover:text-white duration-300 uppercase font-semibold" type="submit" value="<?= lang('Text.search')?>">
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
        $("#content").hide();
        $(".loader-wrapper").fadeIn("slow");
    }

    grecaptcha.ready(function() {
        // do request for recaptcha token
        // response is promise with passed token
        grecaptcha.execute('<?= env('RECAPTCHAV3_SITEKEY') ?>', {action:'validate_captcha'})
            .then(function(token) {
                // add token value to form
                document.getElementById('g-recaptcha-response').value = token;
            });
    });
</script>
<style>
    .loader-wrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,1);
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
        background: darkgray;
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
        0% { height: 0;}
        25% { height: 0;}
        50% { height: 100%;}
        75% { height: 100%;}
        100% { height: 0;}
    }
</style>