<?php $validation = \Config\Services::validation(); ?>
<?php $amount = 2 ?>
<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
<div id="content" class="grid place-item-center">
    <div class="sm:mb-0 h-screen w-screen">
        <div class="mt-24 pb-4 m-4">
            <form method="post" action="<?php echo base_url ('Home/done'); ?>" onsubmit="loading()" class="w-full max-w-2xl  m-auto shadow-2xl rounded-lg bg-white overflow-auto">
                <div class="p-6">
                    <?php if(isset($logo) && $logo !== null){?>
                        <div class="flex justify-center">
                            <a href="/Home" ><img src="<?= $logo ?>" alt="logo" class="w-44"></a>
                        </div>
                    <?php }else{?>
                        <div class="flex justify-center">
                            <a href="/Home"><h1 class="font-bold m-4 text-3xl bg-black text-white w-52 rounded-lg text-center">Return Portal</h1></a>
                        </div>
                    <?php }?>
                    <div class="grid grid-cols-4 m-2 place-items-center">
                        <div class="h-2 w-12 sm:w-24 bg-[<?= $color ?>] color rounded-lg block"></div>
                        <div class="h-2 w-12 sm:w-24 bg-[<?= $color ?>] color rounded-lg block"></div>
                        <div class="h-2 w-12 sm:w-24 bg-[<?= $color ?>] color rounded-lg block"></div>
                        <div class="h-2 w-12 sm:w-24 bg-gray-200 rounded-lg block"></div>
                    </div>
                    <h1 class="m-2 ml-8 sm:ml-0 text-center text-lg sm:text-2xl  font-bold"><?= lang('Text.product_selection')?></h1>
                    <?php if(isset($error)) {?>
                        <div class='text-red-500 text-md italic'>
                            <?php if($error == "empty"){ echo lang('Text.empty'); }?>
                        </div>
                    <?php }?>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3">
                            <?php foreach ($items as $item){ ?>
                                <div class="border-2 block mb-6 rounded-lg hover:scale-105 duration-300">
                                    <div class="px-2 w-full py-2 px-8">
                                        <h1 class="m-4 text-md sm:text-lg block w-full"><?php echo $item['amount'] ?> x <?php echo $item['name'] ?>
                                            <input class="hidden" type="text" name="product[]" value="<?php echo $item['sku'] ?>">
                                            <span class="sm:float-right sm:mr-6 sm:m-0 mt-4 mr-8 flex justify-center">
                                    <button data-action="decrement" id="toggle" class="bg-gray-400 rounded-lg w-6 h-6 sm:w-8 sm:h-8 text-lg sm:text-2xl font-bold text-white text-center hover:scale-110" value="-">-</button><input type="number" id="inputNumber" name="amount[]" min="0" max="<?php echo $item['amount'] ?>" value="0" class="text-center border-0 text-xl" readonly><button data-action="increment" id="toggle" value="+" class="bg-gray-400 rounded-lg w-6 h-6 sm:w-8 sm:h-8 text-lg sm:text-2xl font-bold text-white text-center hover:scale-110">+</button>
                                    </span>
                                        </h1>
                                        <div id="show" class="relative duration-300 ease-in">
                                            <select id="reason" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-md text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="reason[]">
                                                <option value="reason" disabled selected>What is the reason for your return</option>
                                                <?php foreach ($reasons as $reason) {?>
                                                    <option value="<?= $reason ?>"><?= $reason ?></option>
                                                <?php }?>
                                                <?php if($other == true){?>

                                                <option value="other">Others (Please specify in additional notes)</option>
                                                <?php }?>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                        <div id="other" class="m-2">
                                            <input class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:scale-105 duration-300" type="text" placeholder="specify here" name="description[]" >
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($validation->getError('product')) {?>
                                <div id="error" class='text-red-500 text-md italic'>
                                    <?= $error = $validation->getError('product'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="w-full px-3">
                            <input class="appearance-none block w-full bg-white text-black border border-[<?= $color ?>] rounded-lg py-3 px-4 focus:border-[<?= $color ?>] focus:bg-white focus:text-[<?= $color ?>] focus:scale-105 hover:bg-black hover:border-black hover:text-white duration-300 uppercase font-semibold" type="submit" value="<?= lang('Text.next')?>">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    #show{
        display: none;
        transition: width 2s;
    }

    #other{
        display: none;
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

    .loader-wrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: black;
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

<script>
    $(window).on("load", function (){
        $(".loader-wrapper").fadeOut("slow");
    });

    function loading(){
        $("#content").hide();
        $(".loader-wrapper").fadeIn("slow");

    }

    function decrement(e) {
        e.preventDefault();
    }

    function increment(e) {
        e.preventDefault();
    }

    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );

    const numberInput = document.querySelectorAll(
        `input[data-action="numberInput"]`
    );

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });

    [].slice.call(document.querySelectorAll('#toggle')).forEach(function(e){e.onclick = function(){
        if(parseInt(this.parentElement.querySelector('#inputNumber').value) < this.parentElement.querySelector('#inputNumber').max && this.value === '+'){
            this.parentElement.querySelector('#inputNumber').value++;
            this.parentElement.parentElement.parentElement.querySelector('#show').style.display = "block"
        }


        if(this.parentElement.querySelector('#inputNumber').value > this.parentElement.querySelector('#inputNumber').min && this.value === '-'){
            this.parentElement.querySelector('#inputNumber').value--;
            if(this.parentElement.querySelector('#inputNumber').value === this.parentElement.querySelector('#inputNumber').min){
                this.parentElement.parentElement.parentElement.querySelector('#show').style.display = "none";
                this.parentElement.parentElement.parentElement.querySelector('#other').style.display = "none";
            }
        }

    }});

    [].slice.call(document.querySelectorAll('#reason')).forEach(function(e){e.onchange = function(){

        if(this.value === 'other'){
            this.parentElement.parentElement.querySelector('#other').style.display = "block";
        }else{
            this.parentElement.parentElement.querySelector('#other').style.display = "none";
        }


    }});


</script>