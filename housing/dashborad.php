<?php
    $title = 'dashboard';
    include_once 'assets/backend/authmenu.php';
?>
<div class="md:ml-72 px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:px-5 py-5">
    <div class="py-3 text-white bg-red-400 rounded-lg px-4 shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            open Apartment
        </div>
        <div class="text-6xl py-4">
            <?php
                echo $conn->query("SELECT * FROM houses WHERE statu='0'")->num_rows;
            ?>
        </div>
    </div>
    <div class="py-3 px-4 text-white bg-blue-400 rounded-lg shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            Booked Apartment
        </div>
        <div class="text-6xl py-4">
            <?php
                echo $conn->query("SELECT * FROM houses WHERE statu='1'")->num_rows;
            ?>
        </div>
    </div>
    <div class="py-3 px-4 text-white bg-green-400 rounded-lg shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            total Apartments
        </div>
        <div class="text-6xl py-4">
        <?php
            echo $conn->query("SELECT * FROM houses")->num_rows;
        ?>
        </div>
    </div>
    <div class="sm:col-span-2 md:col-span-2 xl:col-span-3 py-3">
        Recently Booked Apartment
        <div class="mt-4  py-2 px-3 bg-blue-500 text-white grid grid-cols-6 lg:grid-cols-7">
            <div class="col-span-4 text-left">Booked By</div>
            <div class="hidden lg:block">Location</div>
            <div class="hidden md:block">amount</div>
            <div class="text-center col-span-2 md:col-span-1">View More</div>
        </div>
        <div class="divide-y">
            <?php
                $query = $conn->query("SELECT * FROM booking ORDER BY id DESC LIMIT 5 ");
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