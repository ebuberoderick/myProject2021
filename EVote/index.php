<?php
$title='Dashboard';
include_once 'backend/nav.php';
?>
<div class="md:ml-72 px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-5 gap-6 lg:px-5 py-5">
    <div class="order-2 sm:order-0 md:order-3 lg:order-4 sm:col-span-1 md:col-span-2 lg:col-span-1 xl:col-span-3">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3 gap-3">
            <div class="py-4 bg-yellow-200 shadow-lg rounded-lg text-white px-4 divide-y">
                <div class="text-xs py-2">Total Number of eligible voters</div>
                <div class="text-5xl py-3">2300</div>
            </div>
            <div class="py-4 bg-purple-300 shadow-lg rounded-lg text-white px-4 divide-y">
                <div class="text-xs py-2">Total Number of Vote</div>
                <div class="text-5xl py-3">130</div>
            </div>
            <div class="py-4 bg-green-400 shadow-lg rounded-lg text-white px-4 divide-y">
                <div class="text-xs py-2">Total Number of Pending vote</div>
                <div class="text-5xl py-3">20</div>
            </div>
        </div>
        <div class="mt-8">
            Top Rankings
        </div>
        <marquee behavior="" direction="" style="" class="">
            <?php
                $positions = $conn->query("SELECT * FROM posirtion");
                while ($position = $positions->fetch_array()) {
                    $position_id= $position['sn'];
                    $yrN=date('Y');
                    $contestants = $conn->query("SELECT * FROM voteorder WHERE position='$position_id' AND yr='$yrN'  ORDER BY votes DESC LIMIT 1");
                    if ($contestants->num_rows > 0) {
                        $contestant = $contestants->fetch_array();
                        $candidate = $contestant['userId'];
                        $candidateD = $conn->query("SELECT * FROM users WHERE id ='$candidate'");
                        $candidateData = $candidateD->fetch_array();
                        $fullName = $candidateData['firstname'] . ' ' . $candidateData['lastname'];
                        ?>
                            <div class="p-3 inline-block mx-3 mb-3 rounded-lg h-96 shadow-lg w-64 bg-blue-200">
                                <div class="py-5 mb-3">
                                    <img src="assets/images/avatars/<?php echo $candidateData['profileImg']   ?>" class="rounded-full w-32 h-32 mx-auto shadow-lg mt-5" alt="">
                                    <div class="text-center mb-6">
                                        <small class="text-center text-md font-semibold text-gray-800 capitalize block mt-3"><?php echo $fullName ?></small>
                                        <small class="text-center text-md font-semibold text-gray-800 capitalize block"><?php echo $position['spotname'] . $yrN ?></small>
                                    </div>
                                    <div class="text-center">
                                        <small class="capitalize text-6xl font-semibold text-gray-800"><?php echo $contestant['votes'] - 1?><span class="text-xs">votes</span></small>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
        </marquee>
    </div>
    <div class="sm:col-span-1 sm:order-2 md:col-span-2 md:order-0 lg:order-4 lg:col-span-1 xl:col-span-2">
         <div class="pb-8">
            <div class="bg-blue-100 py-12  px-8 rounded-lg shadow-lg">
                <div class="">
                    <div class="">Voting time left</div>
                    <div class="text-4xl">
                        <span class="timing"></span>
                        <span id="progressStatus"></span>
                    </div>
                </div>
                <div class="capitalize text-gray-500">voting eligibility</div>
                <div class="flex relative">
                    <?php
                        $eligible = $conn->query("SELECT * FROM receiptlog2 WHERE userid='$user_id' AND yr='$yr'");
                        if($eligible->num_rows > 0){
                            ?>
                                <div class="flex-grow text-green-400">eligible</div>
                            <?php
                        }else{
                            ?>
                                <div class="flex-grow text-red-400">not eligible</div>
                            <?php
                        }
                    ?>
                    <div id="voteBtn"></div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="">Current Executives</div>
            <div class="">
                <div class="bg-white py-2 px-1 shadow-lg rounded-lg divide-x flex">
                    <div class="px-2">SN</div>
                    <div class="px-2 flex-grow">Fullname</div>
                    <div class="px-8">Position</div>
                </div>
                <?php
                    $positionspast = $conn->query("SELECT * FROM posirtion");
                    while ($positionpast = $positionspast->fetch_array()) {
                        $position_idpast= $positionpast['sn'];
                        $yrNpast=date('Y') - 1;
                        $contestantspast = $conn->query("SELECT * FROM voteorder WHERE position='$position_idpast' AND yr='$yrNpast'  ORDER BY votes DESC LIMIT 1");
                        if ($contestantspast->num_rows > 0) {
                            $contestantpast = $contestantspast->fetch_array();
                            $candidatepast = $contestantpast['userId'];
                            $candidateDpast = $conn->query("SELECT * FROM users WHERE id ='$candidatepast'");
                            $candidateDataPast = $candidateDpast->fetch_array();
                            $fullNamepast = $candidateDataPast['firstname'] . ' ' . $candidateDataPast['lastname'];
                            ?>
                                <div class="bg-white py-2 px-1 shadow-lg rounded-lg divide-x flex items-center my-1">
                                    <div class="px-2">SN</div>
                                    <div class="px-2 flex-grow flex items-center gap-2">
                                        <img src="assets/images/avatars/<?php echo $candidateDataPast['profileImg']   ?>" class="w-10 h-10 shadow-lg rounded-full" srcset="">
                                        <div class="capitalize flex-grow"><?php echo $fullNamepast ?></div>
                                    </div>
                                    <div class="px-8"><?php echo    $positionpast['spotname']?></div>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal hidden flex fixed w-screen h-screen z-50 bg-black bg-opacity-75 top-0 right-0 justify-center items-center">
    <div class="py-3 px-2 bg-whitwe border mx-3 bg-white bg-opacity-25 rounded-lg shadow-lg w-96">
        <form name="addform">
            <input type="hidden" name="action" value="startElection">
            <div class="relative">
                <div class="relative sm:top bg-gray-100 cursor-pointer my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa fa-spinner fa-pulse absolute text-gray-500"></i>
                    <i class="right-3 px-2 rotate-45 fa-3x fa cursor-pointer h-full fa-angle-down selector absolute text-gray-500"></i>
                    <div class="flex-grow pl-8 py-2 text-gray-500 selector">Select Election Duration</div>
                </div>
                <div class="relative -top-3 hidden">
                    <div class="option-container w-full absolute border bg-white cursor-pointer text-gray-800 z-20">
                        <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                            <input value="3600" type="radio" class="radio appearance-none hidden" required id="2" name="duration">
                            <label for="2" class="block px-4 cursor-pointer py-1 selector-list">1 Hour</label>
                        </div>
                        <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                            <input value="5400" type="radio" class="radio appearance-none hidden" required id="3" name="duration">
                            <label for="3" class="block px-4 cursor-pointer py-1 selector-list">1 Hour 30 minutes</label>
                        </div>
                        <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                            <input value="7200" type="radio" class="radio appearance-none hidden" required id="me" name="duration">
                            <label for="me" class="block px-4 cursor-pointer py-1 selector-list">2 Hours</label>
                        </div>
                        <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                            <input value="9000" type="radio" class="radio appearance-none hidden" required id="2" name="duration">
                            <label for="2" class="block px-4 cursor-pointer py-1 selector-list">2 Hours 30 minutes</label>
                        </div>
                        <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                            <input value="10800" type="radio" class="radio appearance-none hidden" required id="3" name="duration">
                            <label for="3" class="block px-4 cursor-pointer py-1 selector-list">3 Hours</label>
                        </div>
                        <div class="option hover:bg-blue-400 cursor-pointer hover:text-white">
                            <input value="12600" type="radio" class="radio appearance-none hidden" required id="me" name="duration">
                            <label for="me" class="block px-4 cursor-pointer py-1 selector-list">3 hours 30 minutes</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <button class="relative sm:top bg-green-400 text-white my-3 w-full flex flex-row  py-3 rounded-lg grid uppercase">
                    Set time
                </button>
                <span class="relative cursor-pointer cancel sm:top bg-red-400 text-center text-white my-3 w-full flex flex-row  py-3 rounded-lg grid uppercase">
                    cancel
                </span>
            </div>
        </form>
    </div>
</div>

<script>
    $('.cancel').click(()=>{
        $('.modal').addClass('hidden');
    })
    $('#voteBtn').on('click','.ste',()=>{
        $data = {'action':'checkelectime'}
        $.ajax({
            type: 'post',
            url:'backend/qureies.php',
            data: $data,
            dataType:'json',
            success: function(res){
                if(res.msg == "setime"){
                    $('.modal').removeClass('hidden');
                }else{
                    $data = {'action':'startN', 'perform':'1'}
                    $.ajax({
                        type: 'post',
                        url:'backend/qureies.php',
                        data: $data,
                        dataType:'json',
                        success: function(res2){
                            
                        }
                    })
                }
            }
        })
    })
    $('#voteBtn').on('click','.pau',()=>{
        $data = {'action':'startN', 'perform':'2'}
        $.ajax({
            type: 'post',
            url:'backend/qureies.php',
            data: $data,
            dataType:'json',
            success: function(res2){
                
            }
        })
    })
    $('#voteBtn').on('click','.stp',()=>{
        $data = {'action':'startN', 'perform':'3'}
        $.ajax({
            type: 'post',
            url:'backend/qureies.php',
            data: $data,
            dataType:'json',
            success: function(res2){
                
            }
        })
    })
</script>