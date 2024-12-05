<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProductList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query())->headerActions([
                Action::make('new_product')->icon('heroicon-o-plus')->color('success')->action(
                    fn() =>  redirect()->route('admin.product-create')
                )
            ])
            ->columns([
                ViewColumn::make('images')->label('IMAGE')
                ->view('filament.forms.images'),
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('description')->label('DESCRIPTION')->searchable(),
                TextColumn::make('price')->label('PRICE')->searchable()->formatStateUsing(
                    fn($record) => '₱'. number_format($record->price,2) 
                ),
                TextColumn::make('category.name')->label('CATEGORY')->searchable(),
                TextColumn::make('quantity')->label('QUANTITY')->searchable(),
                ToggleColumn::make('is_featured')->label('FEATURED')->onColor('success')->offColor('danger')->onIcon('heroicon-o-check')
            ])
            ->filters([
                // ...
            ])
            ->actions([
               ActionGroup::make([
                Action::make('add')->label('Add Stocks')->icon('heroicon-o-plus')->action(
                    function($record, $data){
                        $record->update([
                            'quantity' => $record->quantity + $data['quantity']
                        ]);
                    }
                )->form([
                    TextInput::make('remaining_quantity')->default(fn($record) => $record->quantity)->disabled(),
                    TextInput::make('quantity'),
                ])->modalWidth('xl'),
                EditAction::make('edit')
                    ->color('success')
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->label('Product Name'),
                        TextInput::make('description')
                            ->required()
                            ->label('Description'),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('₱')
                            ->label('Price')
                    ])
                    ->modalWidth('xl'),
                DeleteAction::make('delete'),
               ])
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.product-list');
    }
}
