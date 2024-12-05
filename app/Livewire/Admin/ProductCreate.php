<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductImage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProductCreate extends Component implements HasForms
{
    use InteractsWithForms;


    public $images = [], $name, $description, $price, $category, $quantity, $is_featured = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               Grid::make(3)->schema([
                FileUpload::make('images')->required()->multiple()
               ]),
               Grid::make(3)->schema([
               TextInput::make('name')->required(),
               TextInput::make('description')->required()->columnSpan(2),
               TextInput::make('price')->required()->prefix('₱')->numeric(),
               Select::make('category')->options(Category::all()->pluck('name', 'id')),
               TextInput::make('quantity')->required()->numeric(),
               Toggle::make('is_featured')->inline(false)->onColor('success')->offColor('danger')->live(),
               ]),
            ]);
    }

    public function submitRecord(){
        sleep(1);
       $prod = Product::create([
        'name' => $this->name,
        'description' => $this->description,
        'price' => $this->price,
        'category_id' => $this->category,
        'quantity' => $this->quantity,
        'is_featured' => $this->is_featured,
       ]);

       foreach ($this->images as $key => $value) {
        ProductImage::create([
            'product_id' => $prod->id,
            'file_path' => $value->store('Product', 'public'),
        ]);
       }

       return redirect()->route('admin.product');
    }

    public function render()
    {
        return view('livewire.admin.product-create');
    }
}
