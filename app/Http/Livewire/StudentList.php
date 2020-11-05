<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class StudentList extends Component
{

	use WithPagination;

	public $search = null;

	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
    	$students = Student::where('full_name', 'like', '%'.$this->search.'%')
    	->orWhere('email', 'like', '%'.$this->search.'%')
    	->orWhere('contact', 'like', '%'.$this->search.'%')
    	->orWhere('enrollment_no', 'like', '%'.$this->search.'%')
    	->latest()->paginate(10);
        return view('livewire.student-list',compact('students'));
    }
}
