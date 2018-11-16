 
@if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        <b></b>{{ $error }}</span>
                    </div>
              @endforeach
       @endif

 @if(Session('massage'))
                 <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        <b></b>{{ Session('massage') }}</span>
                    </div>
              @endif