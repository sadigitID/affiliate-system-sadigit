<select name="city_id" id="city_id" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" >
    <option>-- Pilih Kabupaten --</option>  
    <?php
        foreach ($cities as $city) {
            ?>
            <option value="<?php echo $city['city_id'];?>"><?php echo $city['city_name'];?></option>
            <?php
        }
    ?>
</select>