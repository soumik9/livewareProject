<div>
   <div>
      <div class="row justify-content-center">
          <div class="col-md-5">
      
              <form action="" wire:submit.prevent="submit">
              <div class="card-header mb-5 text-center" style="margin-top: 100px;">
                  <h3>Login</h3>
              </div>
      
              @if(Session::has('message'))
                     <p class="alert text-success">{{ Session::get('message') }}</p>
              @endif
                       
      
      
              <div class="margin-form">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="">Email</span>
                  </div>
                  <input type="text" class="form-control" wire:model="form.email" placeholder="Enter Email">
                </div>    
                  @error('form.email')
                  <div class="mag" style="margin-top:10px;">
                      <span class="error text-danger">{{ $message }}</span>
                    </div>
                   @enderror
                  </div>  
      
              <div class="margin-form">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="">Password</span>
                  </div>
                  <input type="password" class="form-control" wire:model="form.password" placeholder="Enter Password">
                </div>    
      
                @if(Session::has('passmsg'))
                  <p class="alert text-danger">{{ Session::get('passmsg') }}</p>
                @endif
        
                
                @error('form.password')
                <div class="mag" style="margin-top:10px;">
                  <span class="error text-danger">{{ $message }}</span>
                </div>
                @enderror
              </div>
      
      
      
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </form>
          </div>
      </div>
      </div>
      
</div>
