<div>
<div class="row justify-content-center">
    <div class="col-md-6">

        <form action="" wire:submit.prevent="submit">
        <div class="card-header mb-5 text-center">
            <h3>Sign Up</h3>
        </div>

        @if(Session::has('message'))
   	         <p class="alert text-success">{{ Session::get('message') }}</p>
        @endif


        <div class="margin-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Name</span>
            </div>
            <input type="text" class="form-control" wire:model="form.name" placeholder="Enter Name" autocomplete="on" autocomplete>
          </div>    
          @error('form.name')
          <div class="mag" style="margin-top:10px;">
            <span class="error text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div>

        <div class="margin-form">
          <div class="input-group ">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Email</span>
            </div>
            <input type="text" class="form-control" wire:model="form.email" placeholder="Enter Email" autocomplete="on" autocomplete>
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
    
              @error('form.password')
              <div class="mag" style="margin-top:10px;">
                <span class="error text-danger">{{ $message }}</span>
              </div>
              @enderror
            </div>

        <div class="margin-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Password Confirmation</span>
            </div>
            <input type="password" class="form-control" wire:model="form.password_confirmation" placeholder="Enter Password">
          </div>    
        </div>




          <div class="text-end">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
    </div>
</div>
</div>
