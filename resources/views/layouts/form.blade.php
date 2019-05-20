<div class="container">
    <div class="row">
    <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>form</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4" for="Name">first Name</label>  
  <div class="col-md-4">
  <input id="Name" name="Name" type="text" placeholder="firstname" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name">last Name</label>  
  <div class="col-md-5">
  <input id="Name" name="Name" type="text" placeholder="lastname" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="gender-0">
      <input type="radio" name="gender" id="gender-0" value="Male" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="gender-1">
      <input type="radio" name="gender" id="gender-1" value="Female">
      Female
    </label>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Current-Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" placeholder="currentaddress"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Permanent-Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" placeholder="permanentaddress"></textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="country">Country</label>
  <div class="col-md-5">
    <select id="country" name="country" class="form-control">
      <option value="India">India</option>
      <option value="Afghanistan">Afghanistan</option>
      <option value="Aland Islands">Aland Islands</option>
      <option value="Algeria">Albania</option>
      <option value="">Algeria</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mobilenumber">Mobile Number</label>  
  <div class="col-md-5">
  <input id="mobilenumber" name="mobilenumber" type="text" placeholder="Mobile Number" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Name">date of birth</label>  
  <div class="col-md-5">
  <input id="Name" name="DOB"type="text" placeholder="DOB" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailId">Email Id</label>  
  <div class="col-md-6">
  <input id="emailId" name="emailId" type="text" placeholder="user@domain.com" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Multiple -->
<div class="form-group">
  <label class="col-md-4 control-label" for="languages">Languages Known</label>
  <div class="col-md-5">
    <select id="languages" name="languages" class="form-control" multiple="multiple">
      <option value="English">English</option>
      <option value="Hindi">Hindi</option>
      <option value="Malayalam">Malayalam</option>
      <option value="Others">Others</option>
    </select>
  </div>
</div>

<!-- Prepended checkbox -->
<div class="form-group">
  <label class="col-md-4 control-label" for="check_critiria">Check the box</label>
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-addon">     
          <input type="checkbox">     
      </span>
      <input id="check_critiria" name="check_critiria" class="form-control" type="text" placeholder="I accept the criteria" required="">
    </div>
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-success">Submit</button>
  </div>
</div>

</fieldset>
</form>
    </div>
</div>