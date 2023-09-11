<div>
    
    <form method="post" wire:submit.prevent='changePassword()'>
        <div class="row">
          <div class="col-md-4">
            <div class="my-3">
              <label class="form-label">Kata Sandi Sekarang</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="Current Password" wire:model='current_password'>
              <span class="text-danger">@error('current_password') {{ $message }} @enderror</span>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="my-3">
              <label class="form-label">Kata Sandi Baru</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="New Password" wire:model='new_password'>
              <span class="text-danger">@error('new_password') {{ $message }} @enderror</span>
            </div>
          </div>

          <div class="col-md-4">
            <div class="my-3">
              <label class="form-label">Konfirmasi Kata Sandi Baru</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="Retype new placeholder" wire:model='confirm_new_password'>
              <span class="text-danger">@error('confirm_new_password') {{ $message }} @enderror</span>
            </div>
          </div>

        </div>
        <button type="submit" class="btn btn-primary">Ganti Kata Sandi</button>
      </form>

</div>
