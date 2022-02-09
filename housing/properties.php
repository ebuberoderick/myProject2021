<?php $title = 'Properties' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="assets/style.css">
    <title> <?php echo $title ?> </title>
</head>
<body class="overflow-x-hidden">
<div class="view"></div>
<?php
    include_once 'menu.php';
?>
<div  style="background-image: url('assets/img/nnn.png');background-repeat: no-repeat;background-size: cover;background-position: center center;height:80vh">
    <div class="absolute  w-full bottom-48 px-8">
        <?php
            include_once 'search.php';
        ?>
    </div>
</div>
<div class="text-center py-5 font-extrabold text-xl">Our Properties</div>
<div class="py-12 px-3 md:px-12 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-x-20 gap-y-12">
    <?php
        include_once 'assets/backend/conn.php';
        $query = $conn->query("SELECT * FROM houses WHERE statu='0' ORDER BY id DESC");
        if($query->num_rows > 0){
            while ($type = $query->fetch_assoc()) {
                $hId = $type['id'];
                $img = $conn->query("SELECT * FROM imgs WHERE houseId='$hId' LIMIT 1")->fetch_assoc();
                ?>
                    <div class="shadow-xl p-3 bg-white rounded-3xl">
                        <div class="h-48 rounded-3xl bg-blue-50">
                        <img src="<?php echo $img['imgName']?>" alt="" srcset="" class="h-full w-full rounded-t-lg">
                        </div>
                        <div class="py-2">
                            <div class="font-bold text-lg"><?php echo $type['location'] ?></div>
                            <div class="text-sm flex truncate w-full">
                                <div class="truncate"><?php echo $type['place'] ?></div>
                            </div>
                        </div>
                        <div class="flex w-full gap-2">
                            <div class="font-bold flex-grow text-xl text-green-300">
                                &#8358;<?php echo $type['price'] ?>
                            </div>
                            <div class="">
                                <i class="ri-hotel-bed-line relative" style="top:3px"></i> <?php echo $type['numberRoom'] ?>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-center text-white mt-2">
                            <div class="bg-blue-300 py-1 rounded-3xl cursor-pointer view-prop" id="<?php echo $type['id'] ; ?>">View</div>
                            <div class="bg-green-300 py-1 rounded-3xl cursor-pointer rentNow" name="<?php echo $type['id'] ; ?>" ref="<?php echo $type['place'] ; ?>" id="<?php echo $type['price'] ; ?>">Rent</div>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
</div>
<div class="fixed bg-black bg-opacity-40 hidden w-screen h-screen payBody top-0 right-0 z-40 flex items-center">
    <div class="w-full">
        <div class="max-w-sm p-3 pt-6 relative bg-white mx-auto">
            <div class="text-xl font-bold">Comfirm Payment</div>
            <form method="post" name="ticket" id="paymentForm" accept-charset="UTF-8">
                <input type="hidden" name="action" value="comfirmPay">
                <input type="hidden" id="totalPrice" value="">
                <input type="hidden" name="houseID" id="houseID" value="">
                <div class="relative sm:top border bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-blue-500"></i>
                    <i class="mt-3 ml-3 fa-1x fa fa-user absolute text-gray-500"></i>
                    <input name="fullname" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Fullname"> 
                </div>
                <div class="relative sm:top border bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-blue-500"></i>
                    <i class="mt-3 ml-3 fa-1x fa fa-user absolute text-gray-500"></i>
                    <input name="phone" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Phone Number"> 
                </div>
                <div class="relative sm:top border bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-blue-500"></i>
                    <i class="mt-3 ml-3 fa-1x fa fa-user absolute text-gray-500"></i>
                    <input name="email" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Email"> 
                </div>
                <div class="grid grid-cols-2 gap-3 text-center">
                    <div class=" py-3 cursor-pointer closePay hover:bg-gray-300">cancle</div>
                    <button type="submit" onclick="payWithPaystack()" class="btnre py-3 bg-blue-400 hover:bg-blue-300 text-white">Book Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="fixed bg-black recipt bg-opacity-40 w-screen h-screen hidden top-0 right-0 z-40 flex items-center">
    <div class="w-full">
        <div class="max-w-sm p-3 pt-6 space-y-5 relative bg-white mx-auto">
            <div class="print space-y-4">
                <div class="text-xl font-bold">Payment Recipt</div>
                <div class="">Fullname : <span class="fullname"></span></div>
                <div class="">Phone : <span class="number"></span></div>
                <div class="">E-mail : <span class="mail"></span></div>
                <div class="">Location : Owerri</div>
                <div class="">House Address : <span class="address"></span></div>
                <div class="">Amount Paid : <span class="amt"></span></div>
                <div class="">Duration : 1 Year</div>
                <div class="">Data Time : <?php echo date('d-m-y h:i:s') ?></div>
            </div>
            <div class="grid grid-cols-2 gap-3 text-center">
                <div class=" py-3 cursor-pointer closePay hover:bg-gray-300">Print</div>
                <div class=" py-3 bg-blue-400 hover:bg-blue-300 text-white">Download</div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>
</body>
<script src="assets/jquery.js"></script>
<script src="assets/script.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    $('.rentNow').on('click',function(){
        $('#totalPrice').val($(this).attr('id'))
        $('.amt').val($(this).attr('id'))
        $('#houseID').val($(this).attr('name'))
        $('.address').text($(this).attr('ref'))
        $('.payBody').removeClass('hidden')
    })
    $('.closePay').on('click',function(){
        $('.payBody').addClass('hidden')
    })
</script>
<script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            $formData = $(this)
            $data = $(this).serialize();
            $('.fullname').text($('input[name=fullname]').val())
            $('.number').text($('input[name=phone]').val())
            $('.mail').text($('input[name=email]').val())
            let handler = PaystackPop.setup({
                key: 'pk_test_8a31e17376bd9b0413098cffc7b5a0475a0cf0cc',
                email: 'AnyasodoEstate.apartment@gmail.com',
                amount: document.getElementById("totalPrice").value * 100,
                ref: 'AnyasodoEstate' + Math.floor((Math.random() * 1000000000) + 1),
                // label: "Optional string that replaces customer email"
                onClose: function() {
                    alert('Transaction Canceled');
                },
                callback: function(response) {
                    $.ajax({
                        type: "post",
                        url: "assets/backend/qureies.php",
                        data: $data,
                        success: function (res) {
                            $formData.trigger('reset')
                            $('.payBody').addClass('hidden')
                            $('.recipt').removeClass('hidden')
                        }
                    });
                }
            });
            handler.openIframe();
        }
    </script>