<?php $title = 'Welcome'; ?>
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
    <div class="relative">
        <div id="window" class="bg-white relative overflow-x-hidden h-screen px-3" >
            <div class="absolute hidden lg:block h-full w-2/3 bg-blue-50 transform rotate-45 -right-96 -top-36" style="border-radius:5rem;right: -28rem ;">
                <div class="transform -rotate-90 h-full">
                    <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-8">
                        <div class="transform scale-110">
                            <div class="h-80 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                <div class="transform rotate-45 relative -left-28 -top-20" style="height:150%;width:150%">
                                    <img src="assets/img/1.jpg" class="h-full w-full" srcset="">
                                </div>
                            </div>
                        </div>
                        <div class="col-start-3 transform scale-75 rotate-6 translate-x-2 translate-y-15">
                            
                        </div>
                        <div class="transform translate-y-11">
                            <div class="h-72 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                <div class="transform rotate-45 relative -left-28 -top-20" style="height:150%;width:150%">
                                    <img src="assets/img/2.jpg" class="h-full w-full" srcset="">
                                </div>
                            </div>
                        </div>
                        <div class="transform translate-y-24">
                            <div class="h-64 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                <div class="transform rotate-45 relative -left-28 -top-20" style="height:150%;width:150%">
                                    <img src="assets/img/5.jpg" class="h-full w-full" srcset="">
                                </div>
                            </div>
                        </div>
                        <div class="row-start-1 col-start-2 col-span-2 transform translate-x-20 translate-y-4">
                            <div class="h-96 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                <div class="transform rotate-45 relative -left-48 top-32" style="height:150%;width:150%">
                                    <img src="assets/img/6.jpg" class="h-full w-full" srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed topNav bg-white bg-opacity-0 right-0 w-screen z-40">
                <div class="max-w-7xl top-0 mx-auto py-3">
                    <div class="flex w-full flex-col md:flex-row px-3">
                        <div class="flex-grow">
                            <span class=" text-blue-500 font-bold text-lg">Anyasodo Estate</span>
                            <div id="toggler" class="float-right bg-blue-500 mr-3 md:hidden block px-2 py-1 rounded-md border-2 border-white shadow-lg text-white cursor-pointer">
                                <i class="ri-menu-2-line relative"></i>
                            </div>
                        </div>
                        <div id="togglerElement" class="md:pr-6 py-5 flex-col md:flex-row md:py-0 gap-12 hidden bg-white md:bg-transparent md:flex">
                            <div class="flex flex-col md:flex-row gap-8 capitalize ">
                                <a href="#welcome" class="cursor-pointer">welcome</a>
                                <a href="#about" class="cursor-pointer">about us</a>
                                <a href="#recent" class="cursor-pointer">recent</a>
                                <a href="#testimony" class="cursor-pointer">testimonies</a>
                                <a href="#report" class="cursor-pointer">Report </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-screen relative" id="welcome">
                <div class="absolute w-full bannerSearch">
                    <?php
                        include_once 'search.php' ;
                    ?>
                </div>
                <div class="h-full w-full z-40 flex items-center">
                    <div class="flex-grow">
                        <div class="max-w-7xl mx-auto">
                            <div class="max-w-xl mx-auto lg:mx-2">
                            <div class="text-blue-700 text-xl font-bold">Welcome</div>
                                <div class="font-bold text-5xl md:text-7xl capitalize">
                                    <div class="">let us help you </div>
                                    <div class="">to choose</div>
                                    <div class="">the best</div>
                                </div>
                                <div class="mt-3 text-gray-400">
                                    Eliminate stress and save time in searching for apartments let us serve you with the best apartment around.
                                </div>
                                <div class="flex w-full gap-12 mt-3">
                                    <a href="#" class="bg-blue-500 py-2 px-8 capitalize text-white rounded-2xl text-lg"> <i class="ri-book-open-line relative" style="top:2px"></i> learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-0 lg:mt-12 xl:mt-20 relative w-screen h-screen">
                <div class="h-full w-full z-40 flex items-center" id="about">
                    <div class="flex-grow">
                        <div class="max-w-7xl mx-auto">
                            <div class="flex w-full justify-end">
                                <div class="max-w-xl mx-auto lg:mx-4">
                                    <div class="text-blue-700 text-xl font-bold">About Us</div>
                                    <div class="font-bold text-2xl md:text-5xl capitalize">
                                        <div class="">We provide you with </div>
                                        <div class="">the best property</div>
                                    </div>
                                    <div class="mt-3 text-gray-400 pr-7">
                                        <p>
                                        Residential apartment management is an emerging aspect of managerial science today. It involves establishing goals, objectives and policies and implementation of strategies to achieve those goals and objectives. Apartment management is the work carried out to manage and maintain the development including facilities therein.
                                        </p>
                                        <p class="mt-5">
                                        An apartment is a place where people live, it is one of the basic needs of humanity and as such, different measures need to be taken to ensure that people can rent affordable apartment easily.Renting, also known as hiring or letting, is an agreement where a payment is made for the temporary use of a good, service or property owned by another. 
                                        </p>
                                    </div>
                                    <div class="flex w-full gap-12 mt-8">
                                        <a href="#" class="bg-blue-500 py-2 px-8 capitalize text-white rounded-2xl text-lg"> <i class="ri-book-open-line relative" style="top:2px"></i> learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full abtCard pr-10" id="recent">
                    <div class="max-w-5xl grid lg:grid-cols-3 gap-7 mx-auto">
                        <div class="bg-white shadow-lg py-8 rounded-xl">
                            <div class="flex items-center flex-col">
                                <div class="px-3 py-2 bg-blue-500 text-white rounded-2xl">
                                    <i class="ri-emotion-line text-3xl"></i>
                                </div>
                                <div class="capitalize font-bold">
                                    <div class="text-center">get your dream Home</div>
                                    <p class="text-xs text-gray-400 px-4 text-center mt-4">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, aliquam sequi. Totam nesciunt sed quo voluptas.
                                    </p>
                                </div>
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="bg-blue-500 shadow-lg py-8 text-white rounded-xl">
                            <div class="flex items-center flex-col">
                                <div class="px-3 py-2 bg-white text-black rounded-2xl">
                                    <i class="ri-mac-line text-3xl"></i>
                                </div>
                                <div class="capitalize font-bold">
                                    <div class="text-center">start your membership</div>
                                    <p class="text-xs text-gray-200 px-4 text-center mt-4">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, aliquam sequi. Totam nesciunt sed quo voluptas.
                                    </p>
                                </div>
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="bg-white shadow-lg py-8 rounded-xl">
                            <div class="flex items-center flex-col">
                                <div class="px-3 py-2 bg-blue-500 text-white rounded-2xl">
                                    <i class="ri-ancient-gate-line text-3xl"></i>
                                </div>
                                <div class="capitalize font-bold">
                                    <div class="text-center">enjoy your new home</div>
                                    <p class="text-xs text-gray-400 px-4 text-center mt-4">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, aliquam sequi. Totam nesciunt sed quo voluptas.
                                    </p>
                                </div>
                                <div class=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute hidden lg:block h-full w-2/3 bg-blue-50 transform -rotate-45" style="border-radius:5rem;right: -38rem ; top:40rem"></div>
                <div class="absolute hidden lg:block h-full w-2/3 bg-blue-50 transform -rotate-45" style="border-radius:5rem;left: -38rem ; top:20rem">
                    <div class="transform -rotate-90 h-full">
                        <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-8">
                            <div class="transform scale-110">
                                <div class="h-80 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                    <div class="bg-red-400 transform rotate-180 relative -left-28 -top-20" style="height:150%;width:150%">
                                        <img src="assets/img/1.jpg" class="h-full transform -rotate-45 w-full" srcset="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-3 transform scale-75 rotate-6 translate-x-2 translate-y-15">
                                
                            </div>
                            <div class="transform translate-y-11">
                                <div class="h-72 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                    <div class="bg-red-400 transform rotate-180 relative -left-28 -top-12" style="height:150%;width:150%">
                                        <img src="assets/img/2.jpg" class="h-full transform -rotate-45 w-full" srcset="">
                                    </div>
                                </div>
                            </div>
                            <div class="transform translate-y-24">
                                <div class="h-72 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                    <div class="bg-red-400 transform rotate-180 relative -left-28 -top-12" style="height:150%;width:150%">
                                        <img src="assets/img/4.jpg" class="h-full transform -rotate-45 w-full" srcset="">
                                    </div>
                                </div>
                            </div>
                            <div class="row-start-1 col-start-2 col-span-2 transform translate-x-20 translate-y-4">
                                <div class="h-96 shadow-2xl overflow-hidden" style="border-radius:3rem;">
                                    <div class="bg-red-400 transform rotate-180 relative -left-28 -top-20" style="height:150%;width:150%">
                                        <img src="assets/img/5.jpg" class="h-full transform -rotate-45 w-full" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block" style="height:120vh"></div>
                <div class="">
                    <div class="max-w-4xl mx-auto pr-12">
                        <div class="text-center text-blue-700 text-xl font-bold">
                            Recent
                        </div>
                        <div class="capitalize text-xl font-bold py-2 text-center">recently added apartments</div>
                        <div class="max-w-md mx-auto text-center py-3 text-gray-400">
                        Residential apartment management is an emerging aspect of managerial science today. It involves establishing goals, objectives and policies and implementation of strategies to achieve those goals and objectives.
                        </div>
                        <div class="py-4 grid sm:grid-cols-2 md:grid-cols-3 gap-3 md:gap-x-20 gap-y-12">
                            <?php
                                include_once 'assets/backend/conn.php';
                                $query = $conn->query("SELECT * FROM houses wHERE statu='0' ORDER BY id DESC LIMIT 6");
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
                        <div class="py-12 text-right">
                            <a href="properties.php" class="bg-blue-500 py-2 px-8 capitalize text-white rounded-2xl text-lg"> View more <i class="ri-arrow-right-line relative left-2 top-2" style="top:2px"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="relative flex pr-12 -top-10 items-center w-screen lg:h-screen" id="testimony">
                    <div class="flex-grow">
                        <div class="max-w-7xl mx-auto">
                            <div class="max-w-2xl mx-auto lg:float-right">
                                <div class="text-blue-700 text-xl font-bold">Testimonies</div>
                                <div class="font-bold text-2xl md:text-4xl capitalize">what do people say about us</div>
                                <div class="py-2">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi consectetur dicta at accusantium sit. Deleniti libero iusto magnam adipisci quo expedita, voluptate ipsum tempora minus blanditiis placeat odio explicabo corrupti!
                                </div>
                                <div class="bg-white text-center px-5 gap-3 rounded-2xl border border-blue-50 w-full shadow-xl py-5 mt-3 flex flex-col items-center">
                                    <div class="">
                                        <div class="w-24 h-24 rounded-full bg-red-300 overflow-hidden">
                                            <img src="../assets/avatars/3.jpeg" alt="" class="h-full w-full">
                                        </div>
                                    </div>
                                    <div class="">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic magnam eaque autem mollitia dolorem incidunt nobis pariatur, accusamus dolor. Non beatae voluptate nisi! Consequuntur, fuga voluptas laboriosam neque repellat voluptatem.
                                    </div>
                                    <div class="">
                                        <div class="">Onyemzoro Ebube</div>
                                        <div class="text-sm text-gray-400">ebuberoderick2@gmail.com</div>
                                    </div>
                                </div>
                                <div class="py-6 flex gap-3 justify-center">
                                    <div class="h-3 w-3 rounded-full bg-gray-200 shadow-lg"></div>
                                    <div class="h-3 w-3 rounded-full bg-gray-200 shadow-lg"></div>
                                    <div class="h-3 w-3 rounded-full bg-gray-400 shadow-lg"></div>
                                    <div class="h-3 w-3 rounded-full bg-gray-200 shadow-lg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute hidden lg:block h-full w-2/3 bg-blue-50 transform -rotate-45" style="border-radius:5rem;left: -38rem ;"></div>
                </div>
                <div class="hidden lg:block" style="height:24vh">
                </div>
                <div class="pb-24 pr-12" id="report">
                    <div class="max-w-md mx-auto py-6 space-y-5">
                        <div class="text-center text-blue-600 font-bold">Report / Complain</div>
                        <div class="border bg-white shadow-lg p-2 rounded-lg">
                            <form name="report" class="space-y-3">
                                <input type="hidden" name="action" value="report">
                                <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                                    <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                                    <input name="fullname" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Your Fullname"> 
                                </div>
                                <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                                    <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                                    <input name="phone" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Your Number"> 
                                </div>
                                <div class="relative sm:top bg-white w-full flex flex-row border py-0 rounded-lg grid">
                                    <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                                    <input name="address" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Address"> 
                                </div>
                                <div class="border rounded-lg">
                                    <textarea name="report" required class="w-full bg-gray-50 resize-none rounded-lg p-2" id="" cols="30" rows="10" placeholder="Say Your Report / Complain"></textarea>
                                </div>
                                <button type="submit" class="uppercase text-center bg-blue-400 text-white w-full rounded-lg py-2">
                                    send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include_once 'footer.php'; ?>
            </div>
        </div>
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
    <script src="../assets/js/jquery.js"></script>
    <script src="assets/script.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        $(document).ready(function() {
            $('#window').on('scroll',function (){
                $scrolled = $('#window')[0].scrollTop;
                if($scrolled > 150){
                    $('.topNav').addClass('shadow-lg bg-opacity-100')
                }else{
                    $('.topNav').removeClass('shadow-lg bg-opacity-100')
                }
            })
            $scrolled = $('#window')[0].scrollTop;
            if($scrolled > 150){
                $('.topNav').addClass('shadow-lg bg-opacity-100')
            }else{
                $('.topNav').removeClass('shadow-lg bg-opacity-100')
            }
            $('#toggler').on('click', function () {
                $('#togglerElement').toggleClass('hidden')
                $('#togglerElement').toggleClass('flex')
            })

            $('form[name=report]').on('submit', function (ev){
                ev.preventDefault();
                $formData = $(this)
                $data = $(this).serialize();
                $.ajax({
                    type: 'post',
                    url:'assets/backend/qureies.php',
                    data: $data,
                    dataType:'json',
                    success: function(res){
                        if(res.msg == 'success'){
                            alert('Your Report / Complain have been logged')
                            $formData.trigger('reset')
                        }
                    },
                    error : function(e){
                        console.log(e);
                    }
                })
            });
        })
    </script>
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
</body>
</html>