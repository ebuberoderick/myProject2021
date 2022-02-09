<form name="add" class="space-y-3"  enctype="multipart/form-data">
                    <input type="hidden" name="action" value="addProp">
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
                        <input type="file" id='files' name="files" multiple>
                    </div>
                    <button type="submit" class="uppercase text-center bg-blue-400 text-white w-full rounded-lg py-2">
                        Add property
                    </button>
                </form>