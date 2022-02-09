<?php
    $title = 'Booked Apartment';
    include_once 'assets/backend/authmenu.php';
?>
<div class="md:ml-72 px-2 grid grid-cols-1 lg:px-5 py-5">
    <div class="grid gap-4 grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">
        <div class="shadow-lg relative text-gray-400 my-4 border rounded-lg">
            <i class='material-icons absolute top-2 left-1'>search</i>
            <input type="text" name="search" class="px-3 pl-7 py-2 w-full rounded-lg outline-none" placeholder="Search By Booked by Or Address ">
        </div>
    </div>
    <div class="py-3"> 
        <div class="mt-4  py-2 px-3 bg-blue-500 text-white grid grid-cols-6 lg:grid-cols-7">
            <div class="col-span-4 text-left">Booked By</div>
            <div class="hidden lg:block">Location</div>
            <div class="hidden md:block">amount</div>
            <div class="text-center col-span-2 md:col-span-1">View More</div>
        </div>
        <div class="divide-y">
            <?php
                $query = $conn->query("SELECT * FROM booking");
                if($query->num_rows > 0){
                    while ($type = $query->fetch_assoc()) {
                        ?>
                            <div class="py-2 px-3 cursor-pointer gap-3 bg-gray-50 hover:bg-red-50 text-black grid grid-cols-6 lg:grid-cols-7">
                                <div class="col-span-4">
                                    <div class="flex w-full">
                                        <div class=" overflow-ellipsis truncate">
                                            <?php echo $type['bookedBy'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden lg:block">Owerri</div>
                                <div class="hidden md:block">&#8358;
                                    <?php
                                        $thID = $type['houseId'];
                                        $price = $conn->query("SELECT * FROM houses WHERE id='$thID'")->fetch_assoc();
                                        echo $price['price']
                                    ?>
                                </div>
                                <div class="col-span-2 VM md:col-span-1 text-center" id="<?php echo $type['id'] ?>">
                                    <i class="fa fa-eye"></i>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    ?>
                        <div class="py-2 px-3 cursor-pointer text-center gap-3 bg-gray-50 text-black">
                            No Booking Yet
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<div class="fixed bg-black VMM hidden bg-opacity-40 w-screen h-screen top-0 right-0 z-40 flex items-center">
    <div class="w-full">
        <div class="max-w-md p-3 space-y-5 relative bg-white mx-auto">
            <div class="imgPart space-y-2">
                <div class="h-52 bg-red-900"></div>
                <div class="flex justify-center gap-3">
                    <div class="h-12 w-12 bg-red-900 cursor-pointer"></div>
                    <div class="h-12 w-12 bg-red-900 cursor-pointer"></div>
                    <div class="h-12 w-12 bg-red-900 cursor-pointer"></div>
                </div>
            </div>
            <div class="data space-y-2"></div>
            <div class="text-center VMMC cursor-pointer hover:bg-gray-200 py-5">
                Close
            </div>
        </div>
    </div>
</div>
<script>
    $('.close').on('click',function () {
        $(this).parent().parent().parent().parent().addClass('hidden')
    })
</script>