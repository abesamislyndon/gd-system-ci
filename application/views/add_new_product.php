<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
   <h1><i class="fa fa-plus-square"></i>&nbsp;&nbsp;ADD NEW PRODUCT</h1>
      <hr class = "carved">
     <div class="col-md-12">
       <div class = "confirm-div"></div>
      <?php echo validation_errors(); ?>
      <div class="row form-wrapper">
         <?php echo form_open_multipart('item/do_add_item');?>
        <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Date</label>
          <input type="text" name = "item_date" class="form-control" id="datepicker" value="" required> 
        </div>

        <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Item Name</label>
          <input type="text" name = "item_name" class="form-control" id="firstName" value="" required> 
        </div>

         <div class="col-md-4 margin-bottom-15">                       
          <label for="singleSelect">Category</label>
            <select name = "item_category" class="form-control" id="singleSelect">
             <?php foreach($category as $cat_details):?> 
              <option><?php echo $cat_details->cat_name ?></option>
            <?php endforeach; ?>
            </select>             
         </div>

          <div class="col-md-4 margin-bottom-15">
              <label for="firstName" class="control-label">Item No.</label>
              <input type="text" name = "item_no" class="form-control" id="firstName" value="" required> 
         </div>

         <div class="col-md-4 margin-bottom-15">
              <label for="firstName" class="control-label">Selling Price</label>
              <input type="text" name = "item_sell_price" class="form-control" id="firstName" value="" required> 
         </div>

          <div class="col-md-4 margin-bottom-15">
              <label for="firstName" class="control-label">Purchasing Price</label>
              <input type="text" name = "item_pur_price" class="form-control" id="firstName" value="" required> 
         </div>
           <div class="col-md-4 margin-bottom-15">
              <label for="firstName" class="control-label">item_quantity</label>
              <input type="text" name = "item_quantity" class="form-control" id="firstName" value="" required> 
         </div>

          <div class="col-md-4 margin-bottom-30">
            <label for="exampleInputFile">Upload Photo</label>
            <input type="file" name="userfile"  class = "custom-file-input" required>
            <p class="help-block">Photo must not exceed 3mb</p>  
          </div>    
        <hr class = "carved">
          <div class = "button-div1">
              <input type = "submit" name  = "submit" value= "ADD ITEM" class = "button">
          </div>


         </form>
      </div>
    </div>
  </div>
</div><!--end of templatemo-content-wrapper-->

