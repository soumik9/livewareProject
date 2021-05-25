<div style="margin-top:100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="comment" style="margin-top: 50px">
                   

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif     
                    @if (session()->has('delmessage'))
                        <div class="alert alert-danger">
                            {{ session('delmessage') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ $image }}" 
                                    @if($image)
                                        style="width: 100%; height:250px;"
                                    @endif
                             alt="">
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <label for="formFile" class="form-label">Image Upload & Preview</label>
                        <input class="form-control" type="file" id="image" wire:change="$emit('fileChoosen')">
                      </div>

                    <form action="" wire:submit.prevent="addComment">

                        <h3 class="mt-5 mb-5">Comment</h3>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" wire:model="name" placeholder="name">
                            <input type="text" class="form-control" wire:model="newComment" placeholder="comment">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Save</button>
                          </div>
                          @error('name') <span class="error mb-5 text-danger">{{ $message }}</span> @enderror <br><br>
                          @error('newComment') <span class="error mb-5 text-danger">{{ $message }}</span> @enderror <br><br>
                    </form>
                    @foreach ($comments as $comment)
                    <div class="card mb-5">
                    <div class="row">
                        <div class="col-md-3">
                            @if ($comment->image)
                                <img src="{{ 'storage/'.$comment->image }}" style="width: 100%; height:200px;" alt="no">
                            @endif  
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="card-body">
                                <h2>{{ $comment->name }} <span style="font-size: 14px; font-weight:300;"> {{ $comment->created_at->diffForHumans() }}</span></h2>
                            </div>
                            <div class="card-body mt-0" style="text-align: justify;">
                                {{ $comment->body }}
                            </div> 
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1">
                            <button class="btn btn-danger mt-3" wire:click="remove({{ $comment->id }})">Delete</button>
                        </div>
                    </div>
                </div>
                    @endforeach

                    <div class="mb-5 text-center">
                    {{ $comments->links('customPagination') }}
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    Livewire.on('fileChoosen', () => {

        let inputFile = document.getElementById('image')
        let file = inputFile.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>
