<?php

namespace App\Http\Livewire;

use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{
    use WithPagination;

    public $name;
    //public $comments;
    public $newComment;
    public $image;
    
    protected $listeners = ['fileUpload' => 'handleFileUpload'];


    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    // public function mount()
    // {
    //     $allComment = Comment::latest()->get();
    //     $this->comments = $allComment;
    // }

    //use for customize error message
    protected $messages = [
        'name.required' => 'The name cannot be empty.',
        'newComment.required' => 'The Comment format is not valid.',
        'newComment.max' => 'The Comment format is 255 max.',
    ];

    //validating real time
    public function updated($field)
    {
        $this->validateOnly($field,[
            'name' => 'required',
            'newComment' => 'required|max:255',
        ]);
    }
   

    public function addComment()
    {

        $image = $this->storeImage();
        $createdComment = Comment::create([
                'name' => $this->name, 
                'body' => $this->newComment, 
                'user_id' => 1,
                'image' => $image, 
        ]);
        //$this->comments->push($createdComment);
        //$this->comments->prepend($createdComment);

        

        $this->newComment = "";
        $this->image = "";
        $this->name = "";

        if($createdComment)
        {
            session()->flash('message', 'Comment successfully Added :) ');
        }else
        {
            session()->flash('message', 'Sorry :) ');
        }
    
    }

    public function storeImage()
    {
        if(!$this->image)
        {
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = time().'.jpg';  
        Storage::disk('public')->put($name,$img);

        return $name;
    }

    public function remove($commentId)
    {
       $comment = Comment::find($commentId);

       Storage::disk('public')->delete($comment->image);

       $delete = $comment->delete();
       //$this->comments = $this->comments->except($commentId);

       
       if($delete)
       {
           session()->flash('delmessage', 'Comment successfully Deleted :) ');
       }
       
    }


    public function render()
    {
        return view('livewire.comments',[
            'comments' => Comment::latest()->paginate(3),
        ]);
    }
}
