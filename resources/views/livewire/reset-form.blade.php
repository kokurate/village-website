<div>
    
    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form wire:submit.prevent="ResetHandler()" method="POST" autocomplete="off" novalidate="">
        <div class="mb-4">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" autocomplete="off" wire:model='email' disabled>
          @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">
            Kata Sandi Baru
          </label>
          <div class="input-group input-group-flat">
            <input 
            @if(!$show_password)
            type="password" 
            @else
            type="text"
            @endif
            class="form-control @error('new_password') is-invalid @enderror" placeholder="Kata sandi baru" autocomplete="off" 
            wire:model.lazy='new_password'
            
            >
            <span class="input-group-text">
              <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg wire:click.prevent='show_password' xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
              </a>
            </span>
          </div>
          
        @error('new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
      

        <div class="mb-3">
            <label class="form-label">
              Konfirmasi kata sandi
            </label>
            <div class="input-group input-group-flat">
              <input 
              @if(!$confirm_show_password)
              type="password" 
              @else
              type="text"
              @endif
              
              class="form-control  @error('confirm_new_password') is-invalid @enderror" placeholder="Konfirmasi kata sandi" autocomplete="off" 
              wire:model.lazy='confirm_new_password'
              >
              <span class="input-group-text">
                <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                  <svg wire:click.prevent='confirm_show_password' xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                </a>
              </span>
            </div>   
        @error('confirm_new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>

        
       
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">Reset Kata Sandi</button>
        </div>
    </form>

</div>
