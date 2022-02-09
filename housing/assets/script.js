$(document).ready(function() {
    window.addEventListener('scroll',function (){
        $scrolled = window.scrollY;
        if($scrolled > 150){
            $('.topNav').addClass('shadow-lg bg-opacity-100')
        }else{
            $('.topNav').removeClass('shadow-lg bg-opacity-100')
        }
    })
    $scrolled = window.scrollY;
    if($scrolled > 150){
        $('.topNav').addClass('shadow-lg bg-opacity-100')
    }else{
        $('.topNav').removeClass('shadow-lg bg-opacity-100')
    }
    $('#toggler').on('click', function () {
        $('#togglerElement').toggleClass('hidden')
        $('#togglerElement').toggleClass('flex')
    })

    
    $('form[name=auth]').on('submit', function (ev){
        ev.preventDefault();
        $formData = $(this)
        $data = $(this).serialize();
        $.ajax({
            type: 'post',
            url:'assets/backend/qureies.php',
            data: $data,
            dataType:'json',
            success: function(res){
                if(res.msg == 'login'){
                    window.location.href = 'dashborad.php'
                }else if(res.msg == 'logout'){
                    window.location.href = 'dashborad.php'
                }else{
                    $('.msg').text(res.msg)
                    $formData.trigger('reset')
                }
            },
            error : function(e){
                console.log(e);
            }
        })
    });
    $('.bars').on('click',function(){
        $('.menu').toggleClass('hidden flex')
        $('.sidenav').toggleClass('-ml-72')
    })
    var adminShowingGallery
    $('.VM').on('click',function(){
        var data = {
            action : 'VM',
            val : $(this).attr('id')
        }
        $.ajax({
            type: "post",
            url: "assets/backend/qureies.php",
            data: data,
            dataType: "json",
            success: function (response) {
                $('.data').html(
                    `
                        <div class="">Booked By : <span>${response.data.bookedBy}</span></div>
                        <div class="">Phone : <span>${response.data.phone}</span></div>
                        <div class="">E-mail : <span>${response.data.email}</span></div>
                        <div class="">Address  : <span>${response.ext.place}, ${response.ext.location} </span></div>
                        <div class="">Number of Rooms : <span>${response.ext.numberRoom}</span></div>
                        <div class="">Amount Paid : <span>&#8358;${response.ext.price}</span></div>
                        <div class="">Duration : <span>1 Year</span></div>
                        <div class="">Date Booked : <span>${response.data.crt_at}</span></div> 
                    `
                )
                AddloadPrev(response.imgs , 0)
                adminShowingGallery = response.imgs
                $('.VMM').removeClass('hidden')
            }
        });
    })

    $('.VMMC').on('click',function(){
        $('.VMM').addClass('hidden')
    })

    var ShowingGallery
    $('.view-prop').on('click', function(){
        var data = {
            action : 'getPropImg',
            val : $(this).attr('id')
        }
        $.ajax({
            type: "post",
            url: "assets/backend/qureies.php",
            data:data,
            dataType: "json",
            success: function (res) {
                ShowingGallery = res
                loadPrev(res,0)
            }
        });
    })

    $('.view').on('click','.imgOPtionS',function(){
        loadPrev(ShowingGallery,$(this).attr('id'));
    })
    $('.imgPart').on('click','.AddimgOpt',function(){
        AddloadPrev(adminShowingGallery,$(this).attr('id'));
    })

    $('.view').on('click','.ri-close-line', function(){
        $('.view').html('')
    })
    
    function loadPrev(res , id) {
        var gallery =''
        for (i = 0; i < res.data.length; i++) {
            gallery +=`
                <div class="h-20 w-20 bg-gray-200 cursor-pointer imgOPtionS" id="${i}">
                    <img src="${res.data[i].imgName}" alt="" class="h-full w-full">
                </div>
            `
        }
        $('.view').html(
            `<div class="fixed w-screen px-3 h-screen bg-black bg-opacity-40 flex justify-center items-center" style="z-index:9999999">
                <div class="w-full">
                    <div class="max-w-2xl mx-auto bg-white p-3">
                        <div class="">
                            <div class="h-96 w-full bg-gray-300 relative">
                                <img src="${res.data[id].imgName}" alt="" class="absolute h-full w-full">
                                <i class="ri-close-line absolute right-1 text-xl cursor-pointer"></i> 
                            </div>
                        </div>
                        <div class="flex gap-3 justify-center pt-3">
                            ${gallery}
                        </div>
                    </div>
                </div>
            </div>`
        )
    }

    function AddloadPrev(res , id) {
        var gallery =''
        for (i = 0; i < res.length; i++) {
            gallery +=`
                <div class="h-12 w-12 bg-red-900 AddimgOpt cursor-pointer" id="${i}">
                    <img src="${res[i].imgName}" alt="" class="h-full w-full">
                </div>
            `
        }
        $('.imgPart').html(
            `
                <div class="h-52 bg-red-900 relative">
                    <img src="${res[id].imgName}" alt="" class="absolute h-full w-full">
                </div>
                <div class="flex justify-center gap-3">
                    ${gallery}
                </div>
            `
        )
    }
})

