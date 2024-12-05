<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\Shop\Product;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class OrderList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->where('transaction_type', 'ONLINE')->orderByDesc('created_at'))
            ->columns([
                TextColumn::make('user.name')
                    ->label('USER')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total_amount')
                    ->label('TOTAL AMOUNT')
                    ->searchable()
                    ->formatStateUsing(
                        fn($record) => '₱'.number_format($record->total_amount,2)
                    ),
                TextColumn::make('status')
                    ->label('STATUS')
                    ->searchable()
                    ->formatStateUsing(
                       function($record){
                        switch ($record->status) {
                            case 'pending':
                                return 'Pending';
                            case 'to_pay':
                                return 'To Pay';
                            case 'to_ship':
                                return 'To Ship';
                            case 'to_receive':
                                return 'To Receive';
                            case 'completed':
                                return 'Completed';
                            case 'cancelled':
                                return 'Cancelled';
                            case 'return_refund':
                                return 'Returned Refund';
                            default:
                                return '<span class="badge badge-secondary">Canceled</span>';
                        }
                       }
                    )
                    ->badge()
                    ->color(function (string $state): string {
                        $colors = [
                            'pending' => 'warning',
                            'to_pay' => 'gray',
                            'to_ship' => 'success',
                            'to_receive' => 'success',
                            'completed' => 'success',
                            'cancelled' => 'danger',
                            'return_refund' => 'danger'
                        ];
                        return $colors[$state] ?? 'gray';
                    }),
                TextColumn::make('created_at')
                    ->label('CREATED AT')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make('view')
                    ->label('View Order')
                    ->icon('heroicon-o-shopping-bag')
                    ->button()
                    ->color('warning')
                    ->size('sm')
                    ->form([
                        ViewField::make('rating')
                            ->view('filament.forms.orders')
                    ])
                    ->extraAttributes([
                        'class' => 'flex justify-center'
                    ]),
                ActionGroup::make([
                    Action::make('approve')
                        ->label('Approve')
                        ->color('success')
                        ->icon('heroicon-o-hand-thumb-up')
                        ->action(
                            function($record){
                                foreach ($record->carts as $key => $value) {
                                    $value->product->update([
                                        'quantity' =>  $value->product->quantity - $value->quantity
                                    ]);
                                }
                                $record->update([
                                    'status' => 'to_pay'
                                ]);
                            }
                        )
                        ->visible(fn($record) => $record->status == 'pending'),
                    Action::make('disapprove')
                        ->label('Disapprove')
                        ->color('danger')
                        ->icon('heroicon-o-hand-thumb-down')
                        ->visible(fn($record) => $record->status == 'pending'),
                    Action::make('ship')
                        ->label('Ship Order')
                        ->color('success')
                        ->icon('heroicon-o-paper-airplane')
                        ->visible(fn($record) => $record->status == 'to_pay')
                        ->action(fn($record) => $record->update(['status' => 'to_ship'])),
                    Action::make('receive')
                        ->label('Delivered Order')
                        ->color('success')
                        ->icon('heroicon-o-paper-airplane')
                        ->visible(fn($record) => $record->status == 'to_ship')
                        ->action(fn($record) => $record->update(['status' => 'to_receive']))
                ])
                    ->button()
                    ->label('Actions')
                    ->color('gray')
                    ->size('sm')
                    ->extraAttributes([
                        'class' => 'flex justify-center ml-2'
                    ])
            ])
            ->defaultSort('created_at', 'desc')
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.order-list');
    }
}
