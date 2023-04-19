<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $active = false;
    public $search = '';
    public $namesort = 'asc';
    public $emailsort = 'asc';
    protected $queryString = [
        'active',
        'search' => ['except' => ''],
        'namesort' => ['except' => 'asc'],
        'emailsort' => ['except' => 'asc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function orderByField($field)
    {
        if($field === 'name') {
            $this->namesort = $this->namesort === 'asc' ? 'desc' : 'asc';
        } elseif($field === 'email') {
            $this->emailsort = $this->emailsort === 'asc' ? 'desc' : 'asc';
        }
    }

    public function render()
    {
        return view('livewire.data-table', [
            'users' => User::where('active', $this->active)
                        ->where(function ($query) {
                            $query->where('name', 'like', '%'.$this->search.'%')
                                ->orWhere('email', 'like', '%'.$this->search.'%');
                        })
                        ->when($this->namesort === 'desc', function ($query) {
                            $query->orderBy('name', $this->namesort);
                        })
                        ->when($this->emailsort === 'desc', function ($query) {
                            $query->orderBy('email', $this->emailsort);
                        })
                        ->paginate(10)
        ]);
    }
}
