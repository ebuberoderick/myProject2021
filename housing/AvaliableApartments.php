<?php
    $title = 'Avaliable Apartments';
    include_once 'assets/backend/authmenu.php';
?>
<div class="md:ml-72 px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-4 py-10 gap-6 lg:px-5 py-5">
    <div class="fixed px-3 py-1 rounded-l-lg z-40 cursor-pointer bg-blue-400 text-white right-0 openModal">Add Property</div>
    <div class="fixed bg-black hidden bg-opacity-40 w-screen h-screen modalBody top-0 right-0 z-40 flex items-center">
        <div class="w-full">
            <div class="max-w-md p-3 pt-6 relative bg-white mx-auto">
                <span class="close">
                    <i class="i fa fa-times absolute right-3 top-3 cursor-pointer"></i>
                </span>
                <form action="upload.php" method="post"  class="space-y-3" enctype="multipart/form-data">
                    <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                        <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                        <input name="fullname" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Owner's Fullname"> 
                    </div>
                    <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                        <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                        <input name="phone" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Owner's Phone Number"> 
                    </div>
                    <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                        <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                        <input name="address" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Property Address"> 
                    </div>
                    <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                        <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                        <input name="price" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Property Price"> 
                    </div>
                    <select name="propType" id="recipe_id" required class="w-full rounded-lg py-2 p-2" >
                        <option disabled selected>Select Property Type</option>
                        <?php
                            include_once 'assets/backend/conn.php';
                            $prop = $conn->query("SELECT * FROM housetype");
                            while ($rec = $prop->fetch_array()) {
                                ?>
                                    <option value="<?php echo $rec['sn'] ?>"> <?php echo $rec['name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                        <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                        <input name="NumRooms" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Number Of Rooms"> 
                    </div>
                    <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                        <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                        <!-- <input name="image" type="file" multiple required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Dish Price">  -->
                        <input type="file" id="uploadFile" name="uploadFile[]" multiple required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2"/>  
                    </div>
                    <button type="submit" name="submit" class="uppercase text-center bg-blue-400 text-white w-full rounded-lg py-2">
                        Add property
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php
        $query = $conn->query("SELECT * FROM houses WHERE statu='0'");
        if($query->num_rows > 0){
            while ($type = $query->fetch_assoc()) {
                $hId = $type['id'];
                $img = $conn->query("SELECT * FROM imgs WHERE houseId='$hId' LIMIT 1")->fetch_assoc();
                ?>
                    <div class=" rounded-lg shadow-xl border">
                        <img src="<?php echo $img['imgName']?>" alt="" srcset="" class="h-1/3 w-full rounded-t-lg">
                        <div class="h-2/3 rounded-b-lg p-3">
                            <div class="capitalize">owner:</div>
                            <div class="text-gray-400"><?php echo $type['OwnedBy'] ?>(<?php echo $type['ownPhone'] ?>)</div>
                            <div class="capitalize">location:</div>
                            <div class="text-gray-400"><?php echo $type['location'] ?></div>
                            <div class="capitalize">Address:</div>
                            <div class="text-gray-400"> <?php echo $type['place'] ?></div>
                            <div class="capitalize">price:</div>
                            <div class="text-gray-400"><?php echo $type['price'] ?></div>
                            <div class="capitalize">property type:</div>
                            <div class="text-gray-400">
                                <?php
                                    $sn = $type['houseType'] ;
                                    $proptype = $conn->query("SELECT * FROM housetype WHERE sn='$sn'")->fetch_assoc();
                                    echo $proptype['name']
                                ?>
                            </div>
                            <div class="capitalize">Number Of Room(s):</div>
                            <div class="text-gray-400"><?php echo $type['numberRoom'] ?></div>
                            <div class="pt-3 grid gap-3 grid-cols-2 text-center">
                                <span class="py-2 px-3 hover:bg-gray-200 opacity-0 rounded-lg">view</span>
                                <span class="py-2 RemV px-3 cursor-pointer bg-blue-400 text-white rounded-lg" id="<?php echo $type['id'] ?>">remove</span>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
</div>
<script src="assets/jquery.js"></script>
<script>
    $('.close').on('click',function () {
        $('.modalBody').addClass('hidden')
    })
    $('.openModal').on('click',function(){
        $('.modalBody').removeClass('hidden')
    })

    // $('form[name=add]').on('submit', function (e){
    //     e.preventDefault();
    //     let frmData = new FormData();
    //     frmData.append('action', 'addProp');
    //     frmData.append('propType', $('select[name=propType]').val());
    //     frmData.append('address', $('input[name=address]').val());
    //     frmData.append('phone', $('input[name=phone]').val());
    //     frmData.append('fullname', $('input[name=fullname]').val());
    //     frmData.append('NumRooms', $('input[name=NumRooms]').val());
    //     frmData.append('price', $('input[name=price]').val());
    //     frmData.append('image', $('input[name=image]')[0].files[0]);
    //     $formData = $(this)
    //     $.ajax({
    //         type:'post',
    //         url: 'assets/backend/qureies.php',
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         data:frmData,
    //         dataType:'json',
    //         success: function () {
    //             $formData.trigger('reset')
    //         }
    //     });

    // })
    
    $('.RemV').on('click',function(){
        var data = {
            action: 'RemProp',
            val : $(this).attr('id')
        }
        $.ajax({
            type: "post",
            url: "assets/backend/qureies.php",
            data: data,
            success: function () {
                windows.location = ''
            }
        });
    })
</script>