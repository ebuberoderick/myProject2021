<?php
    $title='Register Contestant';
    include_once 'backend/nav.php';
?>
<div class="md:ml-72 py-5 pb-8 px-2 lg:px-5">
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-x-8">
        <div class="lg:col-span-2 py-3 flex justify-center items-center" style="min-height:80vh">
            <div class="py-3 px-2 bg-whitwe border rounded-lg shadow-lg w-96 lg:w-1/2">
                <form name="addform">
                    <input type="hidden" name="action" value="regcont">
                    <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                            <span class="relative">
                                <i id="red" class="mt-3 ml-3 fa-1x fa absolute right-3 text-red-500"></i>
                                <i id="green" class="mt-3 ml-3 fa-1x fa fa-check right-3 absolute text-green-500"></i>
                            </span>
                            <i class="mt-3 ml-3 fa-1x fa fa-user absolute text-gray-500"></i>
                        <input name="surName" type="text" required class="hidden" placeholder=""> 
                        <input name="regNum" type="text" class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Reg Number"> 
                    </div>
                    <div class="relative">
                        <div class="relative sm:top bg-gray-100 cursor-pointer my-3 w-full flex flex-row  py-0 rounded-lg grid">
                            <i class="mt-3 ml-3 fa-1x fa fa-leaf absolute text-gray-500"></i>
                            <i class="right-3 px-2 rotate-45 fa-3x fa cursor-pointer h-full fa-angle-down selector absolute text-gray-500"></i>
                            <div class="flex-grow pl-8 py-2 text-gray-500 selector">Select Position</div>
                        </div>
                        <div class="relative -top-3 hidden">
                            <div class="option-container w-full absolute border bg-white cursor-pointer text-gray-800 z-20">
                                <?php
                                    $query = $conn->query("SELECT * FROM posirtion");
                                    while ($positions = $query->fetch_assoc()) {
                                        ?>
                                            <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                                                <input value="<?php echo $positions['sn'];?>" required type="radio" class="radio appearance-none hidden" id="<?php echo $positions['spotname'] ?>" name="position">
                                                <label for="<?php echo $positions['spotname'] ?>" class="block px-4 cursor-pointer py-1 selector-list"><?php echo $positions['spotname']; ?></label>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="relative sm:top bg-gray-100 cursor-pointer my-3 w-full flex flex-row  py-0 rounded-lg grid">
                            <i class="mt-3 ml-3 fa-1x fa fa-landmark absolute text-gray-500"></i>
                            <i class="right-3 px-2 rotate-45 fa-3x fa cursor-pointer h-full fa-angle-down selector absolute text-gray-500"></i>
                            <div class="flex-grow pl-8 py-2 text-gray-500 selector">Select Your Level</div>
                        </div>
                        <div class="relative -top-3 hidden">
                            <div class="option-container w-full absolute border bg-white cursor-pointer text-gray-800 z-20">
                                <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                                    <input value="ND 1" type="radio" class="radio appearance-none hidden" required id="me" name="level">
                                    <label for="me" class="block px-4 cursor-pointer py-1 selector-list">ND 1</label>
                                </div>
                                <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                                    <input value="HND 1" type="radio" class="radio appearance-none hidden" required id="PIF" name="level">
                                    <label for="PIF" class="block px-4 cursor-pointer py-1 selector-list">HND 1</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="relative sm:top bg-green-400 text-white my-3 w-full flex flex-row  py-3 rounded-lg grid uppercase">
                        Register receipt
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>