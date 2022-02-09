<?php
    $title = 'Property Type';
    include_once 'assets/backend/authmenu.php';
?>
<div class="md:ml-72 px-2 grid grid-cols-1 lg:grid-cols-3 gap-6 lg:px-5 py-5">
    <span class="absolute right-3 cursor-pointer p-1 lg:hidden" id="slideAdd" style="z-index: 999;"><i class="fa fa-eye"></i></span>
    <div class="lg:col-span-2 py-4">
        <div class="">Avaliable Properties</div>
        <div class="py-4 divide-y">
            <?php
                $query = $conn->query("SELECT * FROM housetype ");
                if($query->num_rows > 0){
                    while ($type = $query->fetch_assoc()) {
                        ?>
                            <div class="flex w-full p-2 hover:bg-blue-100 cursor-pointer">
                                <div class="flex-grow capitalize">
                                    <?php echo $type['name']; ?>
                                </div>
                                <div class="cursor-pointer recpId" id="<?php echo $type['sn']?>" >
                                    <i class="fa fa-trash"></i>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
    <div class="py-4 fixed lg:relative bg-white px-3 h-screen transfrom duration-300  z-40 shadow-lg lg:shadow-none top-42 w-72 lg:w-auto -right-72 lg:right-0" id="slide">
        <div class="text-center">Add property </div>
        <div class="border rounded-lg p-3 shadow-lg">
            <form name="recipe">
                <input type="hidden" name="action" value="addRecipe">
                <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa fa-sun-o absolute text-gray-500"></i>
                    <input name="Recipe" type="text" required class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Property Type"> 
                </div>
                <button type="submit" class="uppercase text-center bg-blue-400 text-white w-full rounded-lg py-2">
                    add property
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    $('.close').on('click',function () {
        $(this).parent().parent().parent().parent().addClass('hidden')
    })
    $('form[name=recipe]').on('submit',function(e){
        e.preventDefault();
        if (confirm('Are sure you want to add this Property type')) {
            var data = $(this).serialize()
            $.ajax({
                type: "post",
                url: "assets/backend/qureies.php",
                data: data,
                dataType: "json",
                success: function (response) {
                    window.location = ''
                }
            });
        }
    })

    $('#slideAdd').on('click',function(){
        $('#slide').toggleClass('-right-72')
        $('#slide').toggleClass('right-0')
    })

    $('.recpId').on('click',function(){
        var data = {
            action:'delRep',
            val : $(this).attr('id')
        }
        $.ajax({
            type: "post",
            url: "assets/backend/qureies.php",
            data: data,
            dataType: "json",
            success: function () {
                window.location = ''
            }
        });
    })
</script>