<div>
 
    <div class="page-header">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="avatar avatar-md" style="background-image: url({{ $author->picture }})"></span>
          </div>
          <div class="col-6 my-2">
            <h2 class="page-title">{{ $author->name }}</h2>
            <div class="page-subtitle">
              <div class="row">
                <div class="col-auto">
                  <a href="#" class="text-reset">@ {{ $author->username }} | {{ $author->authorType->name }}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto d-md-flex my-2">
            <input type="file" name="file" id="changeAuthorPictureFile" class="d-none" onchange="this.dispatchEvent(new InputEvent('input'))">
            <a href="#" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('changeAuthorPictureFile').click();">
           
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 20h-7a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v3.5"></path>
                    <path d="M16 19h6"></path>
                    <path d="M19 16v6"></path>
                    <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                 </svg>
              Ganti Foto Profile
            </a>
          </div>
        </div>
    </div>

</div>
