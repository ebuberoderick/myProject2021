<?php
    $title = 'Reports/Complain';
    include_once 'assets/backend/authmenu.php';
?>
<div class="md:ml-72 pt-16 md:pt-5">
    <div class="grid gap-4 grid-cols-1 px-6 lg:grid-cols-2 xl:grid-cols-3">
        <div class="shadow-lg relative text-gray-400 my-4 border rounded-lg">
            <i class='material-icons absolute top-2 left-1'>search</i>
            <input type="text" name="search" class="px-3 pl-7 py-2 w-full rounded-lg outline-none" placeholder="Search By Owner ">
        </div>
    </div>
    <div class="grid gap-4 pb-8 grid-cols-1 px-6 lg:grid-cols-2 xl:grid-cols-3" id="Appraisal">
        <?php
            $query = $conn->query("SELECT * FROM reports ");
            if($query->num_rows > 0){
                while ($report = $query->fetch_assoc()) {
                    ?>
                        <div class="py-2 px-4 rounded-r-xl bg-white border-l-4 border-blue-900 shadow-lg">
                            <div class="text-gray-400">
                                <div class="text-black">Apartment info</div>
                                <div class="">Location : Owerri</span></div>
                                <div class="">Address : <span><?php echo $report['addres']; ?></div>
                                <div class="">Owner : </div>
                            </div>
                            <div class="">Report / Complain</div>
                            <div class=" py-2 text-gray-400">
                                <?php echo $report['report']; ?>
                            </div>

                            <div class="">Reporter</div>
                            <div class="text-gray-400">
                                By : <span class="capitalize"><?php echo $report['fullname']; ?> (<?php echo $report['phone']; ?>)</span>
                            </div>
                            <div class="text-gray-400">
                                Date : <?php echo $report['cret_at']; ?>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</div>