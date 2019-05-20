        <div class="i-checks">
          <label> 
            <input type="checkbox" name="language[]" id="english"
            value="English"
            {{in_array("English", $data->language) ? 'checked': ''}}>English</label>
          </div>
                              
        <div class="i-checks">
          <label> 
          <input type="checkbox" name="language[]" id="Telugu"
          {{in_array("Telugu", $data->language) ? 'checked': ''}}
           value="Telugu"> Telugu</label>
          </div>
        </div>

          <div class="col-md-3">
          <div class="i-checks">
          <label> 
          <input type="checkbox" value="Hindi" id="Hindi"
                  name="language[]"
          {{in_array("Hindi", $data->language) ? 'checked': ''}}>
          <i></i>Hindi</label>

          <div class="i-checks">
          <label>
           <input type="checkbox" value="Malayalam" id="Malayalam"
           {{in_array("Malayalam", $data->language) ? 'checked': ''}}
                  name="language[]"><i></i> Malayalam</label>
          </div>
           </div> 
          </div>

          <div class="col-md-4">
          <div class="i-checks">
          <label> 
          <input type="checkbox" value="Marathi" id="Marathi"
          {{in_array("Marathi", $data->language) ? 'checked': ''}}
                   name="language[]">Marathi</label>
          </div>
          </div> 
<div class="col-md-3">
        <div class="i-checks">
        <label><input type="checkbox" name="language[]" id="english"
         value="English">English</label>
        </div>
                        
        <div class="i-checks">
         <label><input type="checkbox" name="language[]" id="Telugu"
        value="Telugu"> Telugu</label>
        </div>
    </div>

    <div class="col-md-3">
    <div class="i-checks">
    <label> 
    <input type="checkbox" value="Hindi" id="Hindi"
            name="language[]"><i></i>Hindi</label>

    <div class="i-checks">
    <label>
    <input type="checkbox" value="Malayalam" id="Malayalam"
            name="language[]"><i></i> Malayalam</label>
    </div>
     </div> 
    </div>

    <div class="col-md-4">
        <div class="i-checks">
        <label> 
        <input type="checkbox" value="Marathi" id="Marathi"
        name="language[]">Marathi</label>
        </div>
    </div>  
    