<?php
$title='Settings';
include_once 'backend/nav.php';
?>
<div class="md:ml-72 py-5 pb-8 px-2 lg:px-5">
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-x-8">
        <div class="lg:col-span-2 py-3 divide-y" style="min-height:80vh">
            <div class="">
                <div class="py-4 px-2 hover:bg-gray-200 cursor-pointer">
                    Edit Profile
                </div>
            </div>
            <div class="">
                <div class="py-4 px-2 hover:bg-gray-200 cursor-pointer">
                    Upgdate Profile
                </div>
            </div>
            <div class="UptRes" id="updres">
                <div class="py-4 px-2 hover:bg-gray-200 cursor-pointer">
                    Update Departmental Receipt
                </div>
            </div>
            <div class="">
                <div class="py-4 px-2 hover:bg-gray-200 cursor-pointer">
                    Support
                </div>
            </div>
            <div class="">
                <div class="py-4 px-2 hover:bg-gray-200 cursor-pointer">
                    Change Password
                </div>
            </div>
        </div>
        <div class="hidden xl:block">df</div>
    </div>
</div>

<div class="modal updres hidden flex fixed w-screen h-screen z-50 bg-black bg-opacity-75 top-0 right-0 justify-center items-center">
    <div class="py-3 px-2 border mx-3 bg-white bg-opacity-20 rounded-lg shadow-lg w-96">
        <form name="addform">
            <input type="hidden" name="action" value="updateDepRes">
            <input type="hidden" name="userID" value="<?php echo $user_id; ?>">
            <div class="relative">
                <div class="relative sm:top bg-white cursor-pointer shadow-2xl my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa fa-landmark absolute text-gray-500"></i>
                    <i class="right-3 px-2 rotate-45 fa-3x fa cursor-pointer h-full fa-angle-down selector absolute text-gray-500"></i>
                    <div class="flex-grow pl-8 py-2 text-gray-500 selector">Select Session</div>
                </div>
                <div class="relative -top-3 hidden">
                    <div class="option-container w-full absolute border bg-white cursor-pointer text-gray-800 z-20">
                        <?php
                            $number = 0;
                            while ($number <= 4) {
                                ?>
                                    <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                                        <input value="<?php echo date('Y')-($number + 1) ; echo ' / ' ; echo date('Y')-$number?>" type="radio" class="radio appearance-none hidden" id="session" name="session">
                                        <label for="session" class="block px-4 cursor-pointer py-1 selector-list"><?php echo date('Y')-($number + 1) ; echo ' / ' ; echo date('Y')-$number?></label>
                                    </div>
                                <?php
                                $number ++;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                <i class="mt-3 ml-3 fa-1x fa fa- absolute text-gray-500"></i>
                <input name="resNumber" type="text" placeholder="Enter Receipt Number" class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2"> 
            </div>
            <div class="grid grid-cols-2 gap-2">
                <button class="relative sm:top bg-green-400 text-white my-3 w-full flex flex-row  py-3 rounded-lg grid uppercase">
                    Register Now
                </button>
                <span class="relative cursor-pointer cancel sm:top bg-red-400 text-center text-white my-3 w-full flex flex-row  py-3 rounded-lg grid uppercase">
                    cancel
                </span>
            </div>
        </form>
    </div>
</div>
<script>
    $('.UptRes').on('click',function(){
        $('.'+$(this).attr('id')).removeClass('hidden');
    })
</script>