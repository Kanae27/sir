<?php

namespace App\Livewire\Client;

use App\Models\ClientInformation;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyProfile extends Component implements HasForms
{
    use InteractsWithForms;
    
    public $picture = [], $image, $images, $name, $email, $phone_number, $gender, $birthdate, $address;

    public function mount()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->image = $user->clientInfo->picture ?? '';
        $this->phone_number = $user->clientInfo->phone_number ?? '';
        $this->gender = $user->clientInfo->gender ?? '';
        $this->birthdate = $user->clientInfo->birthdate ?? '';
        $this->address = $user->clientInfo->address ?? '';
    }
    
    public function updatedImages()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        Auth::user()->clientInfo->update([
            'picture' => $this->images->store('Profile', 'public'),
        ]);
        $this->mount();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               FileUpload::make('picture')->avatar()->label('')->hidden(fn() => $this->image != null),
               ViewField::make('rating')
                ->view('filament.forms.avatar')->hidden(fn() => $this->image == null),
               TextInput::make('name'),
               TextInput::make('email'),
               TextInput::make('phone_number'),
               Radio::make('gender')->inline()
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Other' => 'Other'
                ]),
                DatePicker::make('birthdate'),
                TextInput::make('address'),
            ]);
    }

    public function save()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::find(Auth::id());
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if ($user->clientInfo == null) {
            foreach ($this->picture as $key => $value) {
                ClientInformation::create([
                    'phone_number' => $this->phone_number,
                    'gender' => $this->gender,
                    'birthdate' => $this->birthdate,
                    'address' => $this->address,
                    'picture' => $value->store('Profile', 'public'),
                    'user_id' => Auth::id(),
                ]);
            }
        } else {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            $user->clientInfo->update([
                'phone_number' => $this->phone_number,
                'gender' => $this->gender,
                'birthdate' => $this->birthdate,
                'address' => $this->address,
            ]);
        }

        notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->success('Profile updated successfully');

        $this->mount();
    }

    public function render()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        return view('livewire.client.my-profile');
    }
}
