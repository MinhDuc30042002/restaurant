<?php

namespace App\Http\Livewire\Client;

use App\Models\Comment;
use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class Foods extends Component
{
    use WithPagination;

    public $data;
    public $related_item;
    protected $comments;

    public $comment;
    public $addToCart = ['quantity' => 1];

    public $limitPerPage = 5;
    public function render()
    {
        $all_comment_by_id = Comment::where('food_id', $this->data->id)->count();
        $this->comments = Comment::where('food_id', $this->data->id)->orderBy('id', 'DESC')->paginate($this->limitPerPage);
        return view('livewire.client.foods', ['comments' => $this->comments, 'count' => $all_comment_by_id]);
    }

    public function addToCart(Cart $cart)
    {
        $item = ['id' => $this->data->id, 'name' => $this->data->name, 'qty' => $this->addToCart['quantity'], 'price' => $this->data->price, 'weight' => 0, 'options' => ['image' => $this->data->image]];
        $cart->setGlobalTax(0);
        $cart->add([$item]);

        $this->emit('cart_updated');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật giỏ hàng thành công']);
    }

    public function saveComment($user_id, $food_id)
    {
        $data = $this->validate();
        $comment_line = ['text' => $data['comment'], 'user_id' => $user_id, 'food_id' => $food_id];

        Comment::create($comment_line);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật bình luận thành công']);
        $this->comment = '';
    }

    public function onScrollLoadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }

    protected $rules = [
        'comment' => 'required',
    ];

    protected $messages = [
        'comment.required' => ':attribute không được để trống',
    ];

    protected $validationAttributes = [
        'comment' => 'Bình luận',
    ];
}
